@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create financial operations form</h3>
        <form action = "{{'/operations/'.$operation->id}}" method = "POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name = "title" id ="title" class = "form-control" value = "{{$operation->title}}">
                </div>
                <div class="form-group">
                    <label for="body">body</label>
                <input type="text" name = "body" id ="body" class = "form-control" value = "{{$operation->body}}">
                </div>
                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection