@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create financial operations form</h3>
            <form action = "/operations" method = "POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name = "title" id ="title" class = "form-control">
                </div>
                <div class="form-group">
                    <label for="body">body</label>
                    <input type="text" name = "body" id ="body" class = "form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection