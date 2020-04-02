@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create Essentialoperation form</h3>


            <form action = "/essentialoperations" method = "POST">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name = "name" id ="name" class = "form-control">
                </div>
                <div class="form-group">
                    <label for="info">info</label>
                    <input type="text" name = "info" id ="info" class = "form-control">
                </div>


                
				<div class="form-group">
                    <h2>creditor</h2>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal1">Choose accounts</button>
                  
                    <!-- Modal -->
                    <div class="modal fade" id="Modal1" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @foreach($accounts as $account)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value = "{{$account->id}}" class="custom-control-input" id ="{{'creditor'.$account->name}}" name ="accounts[creditor][]"  onclick="myFunction('{{'creditor'.$account->name}}')">
                                            <label class="custom-control-label" for="{{'creditor'.$account->name}}">{{$account->name}}</label>
                                            <input type="text" name = "accounts[amount][creditor][]" value = "0" style="display:none;disabled:disabled" disabled="disabled" id = "{{'amount_creditor'.$account->name}}" class = "form-control">
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



                
                <script>
                    function myFunction(id) {
                    var checkBox = document.getElementById(id);
                    var text = document.getElementById("amount_"+id);
                    if (checkBox.checked == true){
                        text.style.display = "block";
                        text.disabled = false;
                    } else {
                        text.style.display = "none";
                        text.disabled = true;
                    }
                    }
                </script>
                
				<div class="form-group">
                    <h2>debtor</h2>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal2">Choose accounts</button>
                  
                    <!-- Modal -->
                    <div class="modal fade" id="Modal2" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @foreach($accounts as $account)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value = "{{$account->id}}" class="custom-control-input" id ="{{'debtor'.$account->name}}" name ="accounts[debtor][]" onclick="myFunction('{{'debtor'.$account->name}}')">
                                            <label class="custom-control-label" for="{{'debtor'.$account->name}}">{{$account->name}}</label>
                                            <input type="text" name = "accounts[amount][debtor][]" value = "0" style="display:none;disabled:disabled" disabled="disabled" id = "{{'amount_debtor'.$account->name}}" class = "form-control">
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





                



                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Create</button>
                </div>
            </form>



        </div>
    </div>
@endsection