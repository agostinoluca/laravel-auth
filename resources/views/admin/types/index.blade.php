@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">
                    <label for="type_name" class="form-label">Add new project type:</label>
                    <input type="text" class="form-control" name="type_name" id="type_name" aria-describedby="helpId"
                        placeholder="...type here the new project type name..." />
                </div>



            </div>
            <div class="col-7">
                <ul>
                    @foreach ($types as $type)
                        <li>{{ $type->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
