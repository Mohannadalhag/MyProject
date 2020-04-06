<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Essentialoperation;
use App\Account;
use App\Essentialoperationaccount;
class EssentialoperationsController extends Controller
{
    public function index() {
        //$essentialoperations = Essentialoperation::take(5)->get() ;
        $essentialoperations = Essentialoperation::orderBy('id', 'desc')->paginate(5) ;
        $count = Essentialoperation::count();
        return view('essentialoperations.index', compact('essentialoperations','count'));
    }
    public function show($id) {
        $essentialoperation = Essentialoperation::find($id);
        $creditors = $essentialoperation->essentialoperationaccounts()
                ->select('accounts.name','essentialoperationaccounts.amount')
                ->join('accounts','essentialoperationaccounts.account_id','=','accounts.id')
                ->where('essentialoperationaccounts.type', 'creditor')
                ->get();
        $debtors = $essentialoperation->essentialoperationaccounts()
                ->select('accounts.name','essentialoperationaccounts.amount')
                ->join('accounts','essentialoperationaccounts.account_id','=','accounts.id')
                ->where('essentialoperationaccounts.type', 'debtor')
                ->get();
        $data['essentialoperation'] = $essentialoperation;
        $data['creditors'] = $creditors;
        $data['debtors'] = $debtors;
        return view('essentialoperations.show',compact('data'));
    }

    public function create() {
        $accounts = Account:: orderBy('id', 'desc')->get()->all();
        return view('essentialoperations.create',compact('accounts'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'info'  => 'required|max:30'
        ]);
        $essentialoperation = new Essentialoperation();
        $essentialoperation->name = $request->name ;
        $essentialoperation->info = $request->info;
        $essentialoperation->user_id = auth()->user()->id;
        $essentialoperation->save();

        $creditors = $request->accounts['creditor'];
        $debtors = $request->accounts['debtor'];
        $amounts = $request->accounts['amount'];
        foreach ($creditors as $index => $creditor){
            $essentialoperationaccount = new Essentialoperationaccount();
            $essentialoperationaccount->account_id = $creditor;
            $essentialoperationaccount->essentialoperation_id = $essentialoperation->id;
            $essentialoperationaccount->user_id = auth()->user()->id;
            $essentialoperationaccount->amount = $amounts['creditor'][$index];
            $essentialoperationaccount->type = 'creditor';
            $essentialoperationaccount->save();
        }
        foreach ($debtors as $index => $debtor){
            $essentialoperationaccount = new Essentialoperationaccount();
            $essentialoperationaccount->account_id = $debtor;
            $essentialoperationaccount->essentialoperation_id = $essentialoperation->id;
            $essentialoperationaccount->user_id = auth()->user()->id;
            $essentialoperationaccount->amount = $amounts['debtor'][$index];
            $essentialoperationaccount->type = 'debtor';
            $essentialoperationaccount->save();
        }
        return redirect('/essentialoperations')->with('status','essentialoperation was created !');
    }

    public function edit($id){
        $essentialoperation = Essentialoperation::find($id);
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
            ->where('essentialoperationaccounts.essentialoperation_id',$id)
            ->where('essentialoperationaccounts.type','creditor')
            ->get())
            ->get();
        $accountsdebtor = Account:: orderBy('id', 'desc')    
            ->select('accounts.name','accounts.id')
            ->whereNotIn('accounts.name', Account::select('accounts.name')
            ->join('essentialoperationaccounts','essentialoperationaccounts.account_id','=','accounts.id')
            ->where('essentialoperationaccounts.essentialoperation_id',$id)
            ->where('essentialoperationaccounts.type','debtor')
            ->get())
            ->get();
        $data['essentialoperation'] = $essentialoperation;
        $data['creditors'] = $creditors;
        $data['debtors'] = $debtors;
        $data['accountscreditor'] = $accountscreditor;
        $data['accountsdebtor'] = $accountsdebtor;
        return view('essentialoperations.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:20',
            'info'  => 'required|max:30'
        ]);
        $essentialoperation = Essentialoperation::find($id);
        $essentialoperation->essentialoperationaccounts->each->delete();
        $essentialoperation->name = $request->name ;
        $essentialoperation->info = $request->info;
        $essentialoperation->user_id = auth()->user()->id;

        $creditors = $request->accounts['creditor'];
        $debtors = $request->accounts['debtor'];
        $amounts = $request->accounts['amount'];
        foreach ($creditors as $index => $creditor){
            $essentialoperationaccount = new Essentialoperationaccount();
            $essentialoperationaccount->account_id = $creditor;
            $essentialoperationaccount->essentialoperation_id = $essentialoperation->id;
            $essentialoperationaccount->user_id = auth()->user()->id;
            $essentialoperationaccount->amount = $amounts['creditor'][$index];
            $essentialoperationaccount->type = 'creditor';
            $essentialoperationaccount->save();
        }
        foreach ($debtors as $index => $debtor){
            $essentialoperationaccount = new Essentialoperationaccount();
            $essentialoperationaccount->account_id = $debtor;
            $essentialoperationaccount->essentialoperation_id = $essentialoperation->id;
            $essentialoperationaccount->user_id = auth()->user()->id;
            $essentialoperationaccount->amount = $amounts['debtor'][$index];
            $essentialoperationaccount->type = 'debtor';
            $essentialoperationaccount->save();
        }
        $essentialoperation->save();
        return redirect('/essentialoperations')->with('status','essentialoperation was update !');
    }

    public function destroy($id)
    {
        $essentialoperation = Essentialoperation::find($id);
        $essentialoperation->essentialoperationaccounts->each->delete();
        $essentialoperation->delete();
        return redirect('/essentialoperations')->with('status','essentialoperation was deleted !');
    }
}
