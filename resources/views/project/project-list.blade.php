@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-8">
                <div class="pb-4">@include('project.project-tabs')</div>
                <h2>List of projects</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td><a href="{{route('project-view', $project->id)}}">{{$project->name}}</a></td>
                            <td>{{$project->git_url}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$projects->render()}}
            </div>
        </div>
    </div>
@endsection
