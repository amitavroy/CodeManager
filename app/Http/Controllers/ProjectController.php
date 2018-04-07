<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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
}
