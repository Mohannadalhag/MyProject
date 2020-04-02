@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Edit Essentialoperation form</h3>


            <form action = "{{'/essentialoperations/'.$data['essentialoperation']->id}}" method = "POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name = "name" id ="name" class = "form-control" value = "{{$data['essentialoperation']->name}}">
                </div>
                <div class="form-group">
                    <label for="info">info</label>
                    <input type="text" name = "info" id ="info" class = "form-control" value = "{{$data['essentialoperation']->info}}">
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
                                    @foreach($data['creditors'] as $creditor)
                                        <div class="custom-control custom-checkbox">

                                            <input type="checkbox" value = "{{$creditor->id}}" 
                                                class="custom-control-input" 
                                                id ="{{'creditor'.$creditor->name}}" 
                                                name ="accounts[creditor][]"  
                                                onclick="myFunction('{{'creditor'.$creditor->name}}')" checked>

                                            <label class="custom-control-label" 
                                                for="{{'creditor'.$creditor->name}}">
                                                {{$creditor->name}}
                                            </label>

                                            <input type="text" name = "accounts[amount][creditor][]" 
                                                value = "{{$creditor->amount}}" 
                                                id = "{{'amount_creditor'.$creditor->name}}" 
                                                class = "form-control">

                                        </div>
                                    @endforeach
                                    @foreach($data['accountscreditor'] as $account)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value = "{{$account->id}}" 
                                                class="custom-control-input" 
                                                id ="{{'creditor'.$account->name}}" 
                                                name ="accounts[creditor][]" 
                                                 onclick="myFunction('{{'creditor'.$account->name}}')">

                                            <label class="custom-control-label" 
                                                for="{{'creditor'.$account->name}}">
                                                {{$account->name}}</label>
                                            <input type="text" name = "accounts[amount][creditor][]" 
                                                value = "0" style="display:none;disabled:disabled" 
                                                disabled="disabled" id = "{{'amount_creditor'.$account->name}}" class = "form-control">
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
                                    @foreach($data['debtors'] as $debtor)
                                        <div class="custom-control custom-checkbox">

                                            <input type="checkbox" value = "{{$debtor->id}}" 
                                                class="custom-control-input" 
                                                id ="{{'debtor'.$debtor->name}}" 
                                                name ="accounts[debtor][]"  checked
                                                onclick="myFunction('{{'debtor'.$debtor->name}}')">

                                            <label class="custom-control-label" 
                                                for="{{'debtor'.$debtor->name}}">
                                                {{$debtor->name}}
                                            </label>

                                            <input type="text" name = "accounts[amount][debtor][]" 
                                                value = "{{$debtor->amount}}" 
                                                id = "{{'amount_debtor'.$debtor->name}}" 
                                                class = "form-control">

                                        </div>
                                    @endforeach
                                    @foreach($data['accountsdebtor'] as $account)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value = "{{$account->id}}" 
                                            class="custom-control-input" 
                                            id ="{{'debtor'.$account->name}}" 
                                            name ="accounts[debtor][]" 
                                             onclick="myFunction('{{'debtor'.$account->name}}')">
                                            <label class="custom-control-label" 
                                                for="{{'debtor'.$account->name}}">
                                                {{$account->name}}</label>
                                            <input type="text" name = "accounts[amount][debtor][]" 
                                                value = "0" style="display:none;disabled:disabled" 
                                                disabled="disabled" id = "{{'amount_creditor'.$account->name}}" class = "form-control">
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
                    <button type="submit" class = "btn btn-primary">Edit</button>
                </div>
            </form>



        </div>
    </div>
@endsection