@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$post->title}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$post->title}}</h4>
            </div>
            <div class="card-text">
                {{$post->body}}
            </div>
            <hr>
            @auth
            <a href="{{'/posts/'.$post->id.'/edit'}}" class="btn btn-primary"> Edit</a>
        <form action="{{route('posts.destroy',['id'=>$post->id])}}" method = "POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-Danger float left">Delete</button>
        </form>
        @endauth
        </div>    
    </div>
@endsection