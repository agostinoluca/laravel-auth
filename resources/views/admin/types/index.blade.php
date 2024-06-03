@extends('layouts.admin')

@section('content')
    <div class="container p-3">

        @include('partials.action_confirm')
        @include('partials.validation_errors')

        <div class="row">
            <div class="col-5 d-flex flex-column justify-content-between">

                <form action="{{ route('admin.types.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">New type</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="...enter the new project type here" />
                    </div>

                </form>

                <div class="text-start">
                    <a class="btn btn-transparent border border-3 border-secondary"
                        href="{{ route('admin.projects.index') }}" role="button"><i class="fa-solid fa-angles-left"></i> Go
                        Back</a>
                </div>


            </div>




            <div class="col-7">

                <div class="table-responsive rounded-1">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Total projects</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>

                                        <form action="{{ route('admin.types.update', $type) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div>
                                                <input type="text" class="form-control bg-transparent text-dark"
                                                    name="name" id="name" aria-describedby="helpId" placeholder=""
                                                    value="{{ $type->name }}" />
                                            </div>



                                        </form>


                                    </td>
                                    <td>{{ $type->slug }}</td>
                                    <td class="text-center">
                                        <span class="badge border border-2 border-primary text-dark">
                                            {{-- 
                                            {{ count($type->projects) }}    <--- questo metodo oppure il seguente 
                                            --}}
                                            {{ $type->projects->count() }}
                                        </span>
                                    </td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $type->id }}">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $type->id }}">
                                                    Delete type
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete the type called
                                                "<strong>{{ $type->title }}</strong>"?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admin.types.destroy', $type) }}" method="post">
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
                                    <td scope="row" colspan="8" class="text-center fw-bold text-danger">No records.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
