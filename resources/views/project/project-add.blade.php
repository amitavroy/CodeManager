@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-8">
                <div class="pb-4">@include('project.project-tabs')</div>
                <h2>Create new project</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <project-add></project-add>
            </div>
        </div>
    </div>
@endsection
