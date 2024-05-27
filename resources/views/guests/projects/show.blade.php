@extends('layouts.app')
<title>@yield('app.name', $project->slug)</title>

@section('content')
    <div class="jumbotron p-5 mb-4 bg-secondary">
        <div class="container py-5 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold text-light">
                {{ $project->title }}
            </h1>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-transparent border border-2 py-3 text-light" href="{{ url('/') }}" role="button"><i
                        class="fa fa-home" aria-hidden="true"></i>
                    Homepage</a>
                <a class="btn btn-transparent border border-2 py-3 text-light" href="{{ url('/projects') }}"
                    role="button"><i class="fa-solid fa-layer-group"></i> All
                    Projects</a>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="rounded-3 d-flex justify-content-evenly align-items-center gap-2">
            <div>
                @include('partials.screenshot_site')
            </div>

            <div>
                <div>
                    Client: {{ $project->client_name }}
                </div>

                <div>

                    URL site: <a href="#">{{ $project->url }}</a>

                </div>
            </div>
        </div>

        <div class="d-flex pt-4">
            <div class="border rounded-3">
                <div class="bg-secondary fs-1 lead text-light p-1 rounded-top-3">Description:</div>
                <p class="p-5">{{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection
