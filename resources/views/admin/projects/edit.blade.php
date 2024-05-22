@extends('layouts.admin')


@section('content')
    <header class="bg-dark text-white py-4">

        <div class="container d-flex justify-content-between align-items-center">
            <h1>Edit "{{ $project->title }}"</h1>
            <a class="btn btn-danger" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-xmark"></i></a>
        </div>

    </header>


    <div class="container mt-4">
        @include('partials.validation_errors')
        <form action="{{ route('admin.projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="" value="{{ old('title', $project->title) }}" />
                <small id="titleHelper" class="form-text text-muted">Edit the title of Project here</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control" name="client_name" id="client_name"
                    aria-describedby="clientNameHelper" placeholder=""
                    value="{{ old('client_name', $project->client_name) }}" />
                <small id="clientNameHelper" class="form-text text-muted">Who is your client?</small>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label">Budget for the project</label>
                <input type="number" step="0.01" class="form-control" name="budget" id="budget"
                    aria-describedby="budgetHelper" placeholder="" value="{{ old('budget', $project->budget) }}" />
                <small id="budgetHelper" class="form-text text-muted">How is the budget in euro?</small>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" name="url" id="url" aria-describedby="urlHelper"
                    placeholder="" value="{{ old('url', $project->url) }}" />
                <small id="urlHelper" class="form-text text-muted">Link of your site-project.</small>
            </div>


            <button type="submit" class="btn btn-primary">
                Edit
            </button>






        </form>
    </div>
@endsection
