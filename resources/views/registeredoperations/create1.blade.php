@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create Registeredoperation form</h3>


            <form action = "/registeredoperations/create2" method = "POST">
                @csrf
                
				<div class="form-group">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal1">Choose Essential Operations</button>
                  
                    <!-- Modal -->
                    <div class="modal fade" id="Modal1" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <select class="form-control" name = "EssentialOperation" id="sel1">
                                        @foreach($essentialoperations as $essentialoperation)
                                            <option>
                                                {{$essentialoperation->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                



                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Create</button>
                </div>
            </form>



        </div>
    </div>
@endsection