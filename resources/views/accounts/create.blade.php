@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create account form</h3>
            <form action = "/accounts" method = "POST">
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
                    <button type="submit" class = "btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection