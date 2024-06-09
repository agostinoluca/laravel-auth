<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('search')) {
            return response()->json([
                'success' => 'true',
                'results' => Project::with(['type', 'technologies'])->where('title', 'like', '%' . $request->search . '%')->paginate(6),
            ]);
        }


        return response()->json([
            'success' => 'true',
            'results' => Project::with(['type', 'technologies'])->paginate(6),
        ]);
    }



    public function show($id)
    {
        $project = Project::with(['type', 'technologies'])->where('id', $id)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404 not found'

            ]);
        }
    }
}
