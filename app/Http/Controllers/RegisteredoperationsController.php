<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisteredOperation;
use App\Essentialoperation;
use App\Account;
use App\Essentialoperationaccount;
use App\RegisteredOperationAccounts;
class RegisteredoperationsController extends Controller
{
    public function index() {
        //$registeredoperations = registeredoperation::take(5)->get() ;
        $registeredoperations = RegisteredOperation::orderBy('id', 'desc')->paginate(5) ;
        $count = registeredoperation::count();
        return view('registeredoperations.index', compact('registeredoperations','count'));
    }
    public function show($id) {
        $registeredoperation = RegisteredOperation::find($id);
        $creditors = $registeredoperation->registeredoperationaccounts()
                ->select('accounts.name','registered_operation_accounts.amount')
                ->join('accounts','registered_operation_accounts.account_id','=','accounts.id')
                ->where('registered_operation_accounts.type', 'creditor')
                ->get();
        $debtors = $registeredoperation->registeredoperationaccounts()
                ->select('accounts.name','registered_operation_accounts.amount')
                ->join('accounts','registered_operation_accounts.account_id','=','accounts.id')
                ->where('registered_operation_accounts.type', 'debtor')
                ->get();
        $data['registeredoperation'] = $registeredoperation;
        $data['creditors'] = $creditors;
        $data['debtors'] = $debtors;
        return view('registeredoperations.show',compact('data'));
    }

    public function create1() {
        $essentialoperations = Essentialoperation::select("name")->orderBy('id', 'desc')->get()->all();
        return view('registeredoperations.create1',compact('essentialoperations'));
    }
    public function create2(Request $request) {
        $essentialoperation = Essentialoperation::
                where('essentialoperations.name', $request->EssentialOperation)->first();
        //dd($essentialoperation);
        //$essentialoperation = Essentialoperation::where('essentialoperation.name', $request->EssentialOperation);
        $creditors = $essentialoperation->essentialoperationaccounts()
                ->select('accounts.name','accounts.id','essentialoperationaccounts.amount')
                ->join('accounts','essentialoperationaccounts.account_id','=','accounts.id')
                ->where('essentialoperationaccounts.type', 'creditor')->get() ;
        $debtors = $essentialoperation->essentialoperationaccounts()
            ->select('accounts.name','accounts.id','essentialoperationaccounts.amount')
            ->join('accounts','essentialoperationaccounts.account_id','=','accounts.id')
            ->where('essentialoperationaccounts.type', 'debtor')->get();
        
        $accountscreditor = Account:: orderBy('id', 'desc')    
            ->select('accounts.name','accounts.id')
            ->whereNotIn('accounts.name', Account::select('accounts.name')
            ->join('essentialoperationaccounts','essentialoperationaccounts.account_id','=','accounts.id')
            ->where('essentialoperationaccounts.essentialoperation_id',$essentialoperation->id)
            ->where('essentialoperationaccounts.type','creditor')
            ->get())
            ->get();
        $accountsdebtor = Account:: orderBy('id', 'desc')    
            ->select('accounts.name','accounts.id')
            ->whereNotIn('accounts.name', Account::select('accounts.name')
            ->join('essentialoperationaccounts','essentialoperationaccounts.account_id','=','accounts.id')
            ->where('essentialoperationaccounts.essentialoperation_id',$essentialoperation->id)
            ->where('essentialoperationaccounts.type','debtor')
            ->get())
            ->get();
        $data['essentialoperation'] = $essentialoperation;
        $data['creditors'] = $creditors;
        $data['debtors'] = $debtors;
        $data['accountscreditor'] = $accountscreditor;
        $data['accountsdebtor'] = $accountsdebtor;
        
        return view('registeredoperations.create2',compact('data'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'info'  => 'required|max:30'
        ]);
        $registeredoperation = new RegisteredOperation();
        $registeredoperation->name = $request->name ;
        $registeredoperation->info = $request->info;
        $registeredoperation->user_id = auth()->user()->id;
        $registeredoperation->save();

        $creditors = $request->accounts['creditor'];
        $debtors = $request->accounts['debtor'];
        $amounts = $request->accounts['amount'];
        foreach ($creditors as $index => $creditor){
            $registeredoperationaccount = new RegisteredOperationAccounts();
            $registeredoperationaccount->account_id = $creditor;
            $registeredoperationaccount->registered_operation_id = $registeredoperation->id;
            $registeredoperationaccount->user_id = auth()->user()->id;
            $registeredoperationaccount->amount = $amounts['creditor'][$index];
            $registeredoperationaccount->type = 'creditor';
            $registeredoperationaccount->save();
        }
        foreach ($debtors as $index => $debtor){
            $registeredoperationaccount = new RegisteredOperationAccounts();
            $registeredoperationaccount->account_id = $debtor;
            $registeredoperationaccount->registered_operation_id = $registeredoperation->id;
            $registeredoperationaccount->user_id = auth()->user()->id;
            $registeredoperationaccount->amount = $amounts['debtor'][$index];
            $registeredoperationaccount->type = 'debtor';
            $registeredoperationaccount->save();
        }
        return redirect('/registeredoperations')->with('status','registeredoperation was created !');
    }

    public function edit($id){
        $registeredoperation = Registeredoperation::find($id);
        $creditors = $registeredoperation->registeredoperationaccounts()
                ->select('accounts.name','accounts.id','registered_operation_accounts.amount')
                ->join('accounts','registered_operation_accounts.account_id','=','accounts.id')
                ->where('registered_operation_accounts.type', 'creditor')->get() ;
        $debtors = $registeredoperation->registeredoperationaccounts()
            ->select('accounts.name','accounts.id','registered_operation_accounts.amount')
            ->join('accounts','registered_operation_accounts.account_id','=','accounts.id')
            ->where('registered_operation_accounts.type', 'debtor')->get();
        
        $accountscreditor = Account:: orderBy('id', 'desc')    
            ->select('accounts.name','accounts.id')
            ->whereNotIn('accounts.name', Account::select('accounts.name')
            ->join('registered_operation_accounts','registered_operation_accounts.account_id','=','accounts.id')
            ->where('registered_operation_accounts.registered_operation_id',$id)
            ->where('registered_operation_accounts.type','creditor')
            ->get())
            ->get();
        $accountsdebtor = Account:: orderBy('id', 'desc')    
            ->select('accounts.name','accounts.id')
            ->whereNotIn('accounts.name', Account::select('accounts.name')
            ->join('registered_operation_accounts','registered_operation_accounts.account_id','=','accounts.id')
            ->where('registered_operation_accounts.registered_operation_id',$id)
            ->where('registered_operation_accounts.type','debtor')
            ->get())
            ->get();
        $data['registeredoperation'] = $registeredoperation;
        $data['creditors'] = $creditors;
        $data['debtors'] = $debtors;
        $data['accountscreditor'] = $accountscreditor;
        $data['accountsdebtor'] = $accountsdebtor;
        return view('registeredoperations.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:20',
            'info'  => 'required|max:30'
        ]);
        $registeredoperation = RegisteredOperation::find($id);
        $registeredoperation->name = $request->name ;
        $registeredoperation->info = $request->info;
        $registeredoperation->user_id = auth()->user()->id;
        $registeredoperation->registeredoperationaccounts->each->delete();

        $creditors = $request->accounts['creditor'];
        $debtors = $request->accounts['debtor'];
        $amounts = $request->accounts['amount'];
        foreach ($creditors as $index => $creditor){
            $registeredoperationaccount = new RegisteredOperationAccounts();
            $registeredoperationaccount->account_id = $creditor;
            $registeredoperationaccount->registered_operation_id = $registeredoperation->id;
            $registeredoperationaccount->user_id = auth()->user()->id;
            $registeredoperationaccount->amount = $amounts['creditor'][$index];
            $registeredoperationaccount->type = 'creditor';
            $registeredoperationaccount->save();
        }
        foreach ($debtors as $index => $debtor){
            $registeredoperationaccount = new RegisteredOperationAccounts();
            $registeredoperationaccount->account_id = $debtor;
            $registeredoperationaccount->registered_operation_id = $registeredoperation->id;
            $registeredoperationaccount->user_id = auth()->user()->id;
            $registeredoperationaccount->amount = $amounts['debtor'][$index];
            $registeredoperationaccount->type = 'debtor';
            $registeredoperationaccount->save();
        }
        $registeredoperation->save();
        return redirect('/registeredoperations')->with('status','registeredoperation was update !');
    }

    public function destroy($id)
    {
        $registeredoperation = RegisteredOperation::find($id);
        $registeredoperation->registeredoperationaccounts->each->delete();
        $registeredoperation->delete();
        return redirect('/registeredoperations')->with('status','registeredoperation was deleted !');
    }

}
