<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title'=>'required', 
            'description'=>'required'
        ]);
        //$attributes['owner_id'] = Auth::id();
        //Project::create($attributes);
        $project = Auth::user()->projects()->create($attributes);
        return redirect($project->path());
    }

    public function show(Project $project)
    {
        //$project = Project::where('id',$id)->firstOrFail();
        if ( Auth::user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show',compact('project'));
    }
}
