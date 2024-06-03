<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(5);
        $technologies = Technology::all();
        return view('admin.projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');


        if ($request->screenshot_site) {
            $image_path = Storage::put('uploads', $request->screenshot_site);

            $val_data['screenshot_site'] = $image_path;
        }


        $project = Project::create($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->attach($val_data['technologies']);
        }

        return to_route('admin.projects.index')->with('status', 'The new project has been inserted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('screenshot_site')) {
            if ($project->screenshot_site) {
                Storage::delete($project->screenshot_site);
            }

            $image_path = Storage::put('uploads', $request->screenshot_site);

            $val_data['screenshot_site'] = $image_path;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        }

        return to_route('admin.projects.index')->with('status', 'The project was successfully modified!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        if ($project->screenshot_site) {
            Storage::delete($project->screenshot_site);
        }

        // non è necessario utilizzare $project->technologies()->detach();
        // in quanto abbiamo utilizzato nella tabella pivot project_technology il cascadeOnDelete()

        return to_route('admin.projects.index')->with('status', 'The project was successfully deleted!');
    }
}
