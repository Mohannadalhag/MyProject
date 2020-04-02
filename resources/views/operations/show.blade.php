@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$operation->title}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$operation->title}}</h4>
            </div>
            <div class="card-text">
                {{$operation->body}}
            </div>
            <hr>
            @auth
            <a href="{{'/operations/'.$operation->id.'/edit'}}" class="btn btn-primary"> Edit</a>
        <form action="{{route('operations.destroy',['id'=>$operation->id])}}" method = "POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-Danger float left">Delete</button>
        </form>
        @endauth
        </div>    
    </div>
@endsection