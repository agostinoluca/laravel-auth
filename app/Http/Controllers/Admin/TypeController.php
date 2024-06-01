<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderByDesc('id')->get();
        return view('admin.types.index', compact('types'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        // dd($request->all());
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');
        Type::create($val_data);
        return to_route('admin.types.index')->with('status', 'The type was successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        // dd($request->all());
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');
        $type->update($val_data);

        return to_route('admin.types.index')->with('status', 'The type was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return to_route('admin.types.index')->with('status', 'The type was successfully deleted!');
    }
}
