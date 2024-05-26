@extends('layouts.app')
@section('content')
    <div class="text-center p-5 mb-4 bg-secondary">
        <img class="img-fluid mx-auto d-block" src="{{ asset('images/projects.png') }}" alt="">
    </div>

    <section class="latest_projects">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4">
                @forelse ($latest_projects as $project)
                    <div class="col p-3">
                        <a href="{{ route('projects.show', $project) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div>
                                    @if (Str::startsWith($project->screenshot_site, 'https://'))
                                        <img class="rounded-3 card-img-top" width="150"
                                            src="{{ $project->screenshot_site }}" alt="Screenshot of the site/project"
                                            loading="lazy">
                                    @elseif (!$project->screenshot_site)
                                        <div class="text-secondary">No image uploaded</div>
                                    @else
                                        <img width="150" class="rounded-3 card-img-top"
                                            src="{{ asset('storage/' . $project->screenshot_site) }}"
                                            alt="Screenshot of the site/project">
                                    @endif
                                </div>
                                <div class="card-body text-center">
                                    <h3>{{ $project->title }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No projects available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
