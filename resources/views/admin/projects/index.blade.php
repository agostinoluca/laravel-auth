@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
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
                            <td><img class="rounded-3" width="150" src="{{ $project->screenshot_site }}" alt="">
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td>{{ $project->budget }}€</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->url }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">View</a>
                            </td>
                        </tr>
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
