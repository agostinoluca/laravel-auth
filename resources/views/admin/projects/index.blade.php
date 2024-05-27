@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white pt-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>My Projects</h1>
            <a class="btn btn-transparent border" href="{{ route('admin.projects.create') }}"> <i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Add new project</a>
        </div>
    </header>

    <div class="container mt-3">

        @include('partials.action_confirm')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Screenshot Site</th>
                        <th scope="col">Title</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Url</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>
                                @include('partials.screenshot_site')
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td>{{ $project->budget }}€</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->url }}</td>
                            <td style="white-space: nowrap;">

                                <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.show', $project) }}"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a class="btn btn-sm btn-secondary " href="{{ route('admin.projects.edit', $project) }}"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>


                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $project->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                            Delete Project
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete the project called
                                        "<strong>{{ $project->title }}</strong>"?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                DELETE
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="8" class="text-center fw-bold text-danger">No records.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
