@extends('layouts.admin')
<title>@yield('app.name', $project->slug)</title>

@section('content')
    <div class="container mt-5 text-center">
        <div class="pb-3">
            <div class="bg-secondary text-light p-2">Project name:</div>
            <h2 class="text-uppercase border border-1 p-3">{{ $project->title }}</h2>
        </div>

        <div class="pb-5 d-flex">
            @include('partials.screenshot_site')
            <div class="d-flex flex-column px-3">
                <div>
                    <div class="bg-secondary text-light p-2 rounded-2">Description:</div>
                    <p class="p-5">{{ $project->description }}</p>
                </div>


                @if ($project->type)
                    <div class="bg-secondary text-light p-2 rounded-2">Project type</div>
                    <div class="pt-3 fw-medium">{{ $project->type->name }}</div>
                @endif


                @if ($project->technologies->isNotEmpty())
                    <div class="bg-secondary text-light p-2 rounded-2 mt-3">Used technologies</div>
                    <div class="pt-3 fw-medium">
                        @foreach ($project->technologies as $tech)
                            <span class="d-flex p-2 justify-content-center">
                                <span class="badge bg-primary bg-opacity-75">
                                    {{ $tech->name }}
                                </span>
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-secondary text-light rounded-3 p-4 d-flex flex-column gap-2">

            <div>
                Client: {{ $project->client_name }}
            </div>

            <div>
                Budget: {{ $project->budget }}€
            </div>

            <div>

                URL site: <a href="#">{{ $project->url }}</a>

            </div>
        </div>
        <div class="py-3 text-start">
            <a class="btn btn-transparent border border-3 border-secondary" href="{{ route('admin.projects.index') }}"
                role="button"><i class="fa-solid fa-angles-left"></i> Go
                Back</a>
        </div>

    </div>
@endsection
