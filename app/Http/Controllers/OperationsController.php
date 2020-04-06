<?php

//namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Essentialoperation;
//use App\Operation;
/*class OperationsController extends Controller
{
    
    public function index() {
        //$essentialoperations = essentialoperation::take(5)->get() ;
        $essentialoperations = Essentialoperation::orderBy('id', 'desc')->paginate(5) ;
        $count = Essentialoperation::count();
        return view('operations.index', compact('essentialoperations','count'));
    }
    public function show($id) {
        $essentialoperation = Essentialoperation::find($id);
        return view('operations.show',compact('essentialoperation'));
    }

    public function create() {
        return view('operations.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:20',
            'body'  => 'required|max:30'
        ]);
        $essentialoperation = new Essentialoperation();
        $essentialoperation->title = $request->title ;
        $essentialoperation->body = $request->body;
        $essentialoperation->user_id = auth()->user()->id;
        $essentialoperation->save();
        return redirect('/essentialoperations')->with('status','essentialoperation was created !');
    }

    public function edit($id){
        $essentialoperation = Essentialoperation::find($id);
        return view('operations.edit',compact('essentialoperation'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:20',
            'body'  => 'required|max:30'
        ]);
        $essentialoperation = Essentialoperation::find($id);
        $essentialoperation->title = $request->title ;
        $essentialoperation->body = $request->body;
        $essentialoperation->save();
        return redirect('/essentialoperations')->with('status','essentialoperation was update !');
    }

    public function destroy($id)
    {
        $essentialoperation = Essentialoperation::find($id);
        $essentialoperation->delete();
        return redirect('/essentialoperations')->with('status','essentialoperation was deleted !');
    }
    
}*/
