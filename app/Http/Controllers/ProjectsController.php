<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('name')->paginate();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Storage::putFile('projects/images', $request->file('image'));
            $data = array_add($data, 'image', $image);
        }

        $project->update($data);

        return redirect()->route('projects.show', $project)->with('success', '数据已保存');
    }
}
