@extends('layouts.app')

@section('content')
    <header class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>My Projects</h1>
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new project</a>
        </div>
    </header>

    <div class="container mt-5">
        <h1>Guests / projects </h1>
    </div>
@endsection
