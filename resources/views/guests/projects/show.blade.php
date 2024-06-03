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

            <div class="d-flex flex-column gap-3 text-start">
                @if ($project->type)
                    <div>
                        <span class="lead">Project Type: </span>{{ $project->type->name }}
                    </div>
                @else
                    <div>
                        <span class="lead">Project Type: </span>N/A
                    </div>
                @endif


                @if ($project->client_name)
                    <div>
                        <span class="lead">Client: </span>{{ $project->client_name }}
                    </div>
                @else
                    <div>
                        <span class="lead">Client: </span>N/A
                    </div>
                @endif

                @if ($project->url)
                    <div>
                        <span class="lead">URL site: </span><a href="#">{{ $project->url }}</a>
                    </div>
                @else
                    <div>
                        <span class="lead">URL site: </span>N/A
                    </div>
                @endif

            </div>
        </div>

        @if ($project->technologies->isNotEmpty())
            <div class="d-flex justify-content-center align-items-center pt-4">
                <span class="lead">
                    Project Technologies:
                </span>
                @foreach ($project->technologies as $tech)
                    <span class="d-flex px-1">
                        <span class="badge bg-primary bg-opacity-75">
                            {{ $tech->name }}
                        </span>
                    </span>
                @endforeach
            </div>
        @endif

        <div class="d-flex pt-4">
            <div class="border rounded-3 w-100">
                <div class="bg-secondary fs-1 lead text-light p-1 rounded-top-3">Description:</div>
                <p class="p-5">{{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection
