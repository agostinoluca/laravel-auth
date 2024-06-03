@extends('layouts.admin')


@section('content')
    <header class="bg-dark text-white py-4">

        <div class="container d-flex justify-content-between align-items-center">
            <h1>Add a new project</h1>
            <a class="btn btn-danger" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-xmark"></i></a>
        </div>

    </header>


    <div class="container mt-4">
        @include('partials.validation_errors')
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select one</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pb-3">
                @foreach ($technologies as $tech)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{ $tech->id }}"
                            id="technology-{{ $tech->id }}" name="technologies[]"
                            {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="technology-{{ $tech->id }}">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Add the title of new Project here</small>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="screenshot_site" class="form-label">Upload the screenshot of the site</label>
                <input type="file" class="form-control" name="screenshot_site" id="screenshot_site"
                    aria-describedby="screenshotSiteHelper" placeholder="Screenshot of the site" />
                <small id="screenshotSiteHelper" class="form-text text-muted">Upload an image</small>
                @error('screenshot_site')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control" name="client_name" id="client_name"
                    aria-describedby="clientNameHelper" placeholder="" value="{{ old('client_name') }}" />
                <small id="clientNameHelper" class="form-text text-muted">Who is your client?</small>
                @error('client_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label">Budget for the project</label>
                <input type="number" step="0.01" class="form-control" name="budget" id="budget"
                    aria-describedby="budgetHelper" placeholder="" value="{{ old('budget') }}" />
                <small id="budgetHelper" class="form-text text-muted">How is the budget in euro?</small>
                @error('budget')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" name="url" id="url" aria-describedby="urlHelper"
                    placeholder="" value="{{ old('url') }}" />
                <small id="urlHelper" class="form-text text-muted">Link of your site-project.</small>
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-transparent border border-3 border-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Project
            </button>






        </form>
    </div>
@endsection
