<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('name')->paginate(10);

        return view('project.project-list', compact('projects'));
    }

    public function add()
    {
        return view('project.project-add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2',
            'git_url' => 'required',
        ]);

        Project::create([
            'name' => $data['name'],
            'git_url' => $data['git_url'],
        ]);

        return response()->json([], 201);
    }

    public function view($id)
    {
        $project = Project::findOrFail($id);

        return view('project.project-view', compact('project'));
    }
}
