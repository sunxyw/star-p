<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('settings')) {
            if ($request->has('withTrashed')) {
                $projects = Project::withTrashed()->orderBy('name')->paginate();
            } else {
                $projects = Project::orderBy('name')->paginate();
            }
        } else {
            $projects = Project::where('user_id', Auth::id())->orderBy('name')->paginate();
        }
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
            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert('images/logo.png', 'bottom-right', null, 10);
            $image = $img->save('storage/projects/images/' . $request->file('image')->hashName())->basePath();
            $image = str_replace('storage/', '', $image);
            $data = array_add($data, 'image', $image);
        }

        $project->update($data);

        return 'yes';
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['image', 'sync']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert('images/logo.png', 'bottom-right', null, 10);
            $image = $img->save('storage/projects/images/' . $request->file('image')->hashName())->basePath();
            $image = str_replace('storage/', '', $image);
            $data = array_add($data, 'image', $image);
        } else {
            return abort(500);
        }

        $data = array_add($data, 'user_id', Auth::id());

        if ($request->has('sync') && $request->input('sync') == 'on') {
            $data = array_add($data, 'status', Project::STATUS_PENDING);
        }

        $project = Project::create($data);

        return 'yes';
    }

    /**
     * @param Project $project
     * @author sunxyw <xy2496419818@gmail.com>
     * @return bool
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return 'yes';
    }
}
