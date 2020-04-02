@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Edit post form</h3>
        <form action = "{{'/posts/'.$post->id}}" method = "POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name = "title" id ="title" class = "form-control" value = "{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="body">body</label>
                <input type="text" name = "body" id ="body" class = "form-control" value = "{{$post->body}}">
                </div>
                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection