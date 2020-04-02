@extends('Layouts.master')

@section('content')
    <h2> List of all financial operations</h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="row">
                    @foreach($operations as $operation)
                        <div class="col-md-4">
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
                                <a href="{{'/operations/'.$operation->id}}" class="btn btn-primary"> Show More</a>
                                </div>    
                            </div>
                       </div>
                    @endforeach
                </div>
 
            </div>
            
        </div>

        <div class="col-md-3">
                <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-info text-white"> Stats.</div>
                        <div class="card-body">
                        
                        <p class="card-text"> All operations: {{$count}}</p>
                        </div>
                    </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{$operations->links()}}
        </div>
    </div>
@endsection