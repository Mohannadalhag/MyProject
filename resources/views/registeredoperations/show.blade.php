@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$data['registeredoperation']->name}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$data['registeredoperation']->name}}</h4>
            </div>
            <div class="card-text">
                {{$data['registeredoperation']->info}}
            </div>



            
            <div class="container">
                <h2>debtor</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal1">Display accounts</button>
                
                <!-- Modal -->
                <div class="modal fade" id="Modal1" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @foreach($data['debtors'] as $debtor)
                                    <div>
                                        <label>{{$debtor->name}}</label>
                                        <label>{{$debtor->amount}}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2>creditor</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal2">Display accounts</button>
                
                <!-- Modal -->
                <div class="modal fade" id="Modal2" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @foreach($data['creditors'] as $creditor)
                                    <div>
                                        <label>{{$creditor->name}}</label>
                                        <label>{{$creditor->amount}}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <hr>
            @auth
            <a href="{{'/registeredoperations/'.$data['registeredoperation']->id.'/edit'}}" class="btn btn-primary"> Edit</a>
            <form action="{{route('registeredoperations.destroy',['id'=>$data['registeredoperation']->id])}}" method = "POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-Danger float left">Delete</button>
            </form>
            @endauth
        </div>    
    </div>
@endsection