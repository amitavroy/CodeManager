@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-8">
                <a href="{{route('project-list')}}" class="btn btn-primary">Back to listing</a>
                <hr>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-sm-8">
                <h2>Project details</h2>
                <p>Name: {{$project->name}}</p>
            </div>
        </div>
    </div>
@endsection
