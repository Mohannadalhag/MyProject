@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create account form</h3>
        <form action = "{{'/accounts/'.$account->id}}" method = "POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">name</label>
                <input type="text" name = "name" id ="name" class = "form-control" value = "{{$account->name}}">
                </div>
                <div class="form-group">
                    <label for="info">info</label>
                <input type="text" name = "info" id ="info" class = "form-control" value = "{{$account->info}}">
                </div>
                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection