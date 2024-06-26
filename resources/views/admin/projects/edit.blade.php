@extends('layouts.admin')


@section('content')
    <header class="bg-dark text-white py-4">

        <div class="container d-flex justify-content-between align-items-center">
            <h1>Edit "{{ $project->title }}"</h1>
            <a class="btn btn-danger" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-xmark"></i></a>
        </div>

    </header>


    <div class="container my-4">
        @include('partials.validation_errors')
        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="" selected>Select one</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pb-3">
                @foreach ($technologies as $tech)
                    <div class="form-check form-check-inline">

                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" value="{{ $tech->id }}"
                                id="technology-{{ $tech->id }}" name="technologies[]"
                                {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="technology-{{ $tech->id }}">{{ $tech->name }}</label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $tech->id }}"
                                id="technology-{{ $tech->id }}" name="technologies[]"
                                {{ $project->technologies->contains($tech->id) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="technology-{{ $tech->id }}">{{ $tech->name }}</label>
                        @endif

                    </div>
                @endforeach
            </div>

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

            <div class="d-flex gap-5 align-items-center py-4">
                @include('partials.screenshot_site', ['width' => '200px', 'aspectRatio' => '16/9'])
                <div class="mb-3">
                    <label for="screenshot_site" class="form-label">Change the screenshot of the site</label>
                    <input type="file" class="form-control" name="screenshot_site" id="screenshot_site"
                        aria-describedby="screenshotSiteHelper" placeholder="Screenshot of the site" />
                    <small id="screenshotSiteHelper" class="form-text text-muted">Upload an image</small>
                </div>
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


            <button type="submit" class="btn btn-transparent border border-3 border-success">
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
            </button>






        </form>
    </div>
@endsection
