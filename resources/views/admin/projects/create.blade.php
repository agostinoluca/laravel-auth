@extends('layouts.admin')


@section('content')
    <div class="container">
        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="" />
                <small id="titleHelper" class="form-text text-muted">Add the title of new Project here</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control" name="client_name" id="client_name"
                    aria-describedby="clientNameHelper" placeholder="" />
                <small id="clientNameHelper" class="form-text text-muted">Who is your client?</small>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label">Budget for the project</label>
                <input type="number" step="0.01" class="form-control" name="budget" id="budget"
                    aria-describedby="budgetHelper" placeholder="" />
                <small id="budgetHelper" class="form-text text-muted">How is the budget in euro?</small>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" name="url" id="url" aria-describedby="urlHelper"
                    placeholder="" />
                <small id="urlHelper" class="form-text text-muted">Link of your site-project.</small>
            </div>


            <button type="submit" class="btn btn-primary">
                Add Project
            </button>






        </form>
    </div>
@endsection
