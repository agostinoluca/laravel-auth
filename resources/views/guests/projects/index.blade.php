@extends('layouts.app')

@section('content')
    <header class="p-5 mb-4 bg-secondary">
        <div class="container d-flex justify-content-between align-items-center text-white p-5">
            <h1>Browse all my amazing projects!</h1>
            <a class="btn btn-transparent border border-2 py-3 text-light" href="{{ url('/') }}"><i class="fa fa-home"
                    aria-hidden="true"></i>
                Homepage</a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row row-cols-1">

            @forelse ($projects as $project)
                <div class="col p-4">
                    <a href="{{ route('projects.show', $project) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <div class="text-center p-2 pt-5 bg-white">
                                <h2>{{ $project->title }}</h2>
                            </div>
                            <div style="max-width: 600px" class="m-auto p-2 py-3">
                                @include('partials.screenshot_site')
                            </div>
                            <div class="p-3 text-center">
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p>No projects available. &#x1F622;</p>
                </div>
            @endforelse
        </div>
        <div>
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
