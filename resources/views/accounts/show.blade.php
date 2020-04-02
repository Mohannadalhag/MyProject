@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$account->name}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$account->name}}</h4>
            </div>
            <div class="card-text">
                {{$account->info}}
            </div>
            <hr>
            @auth
            <a href="{{'/accounts/'.$account->id.'/edit'}}" class="btn btn-primary"> Edit</a>
        <form action="{{route('accounts.destroy',['id'=>$account->id])}}" method = "POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-Danger float left">Delete</button>
        </form>
        @endauth
        </div>    
    </div>
@endsection