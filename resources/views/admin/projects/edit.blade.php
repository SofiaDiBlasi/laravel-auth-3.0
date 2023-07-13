@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <h1>Modifica progetto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('admin.projects.update', $project->id ) }}" method="post" class="needs-validation">
                @csrf

                @method("PUT")

                <label>Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old("name")  ?? $project->name}}">
                @error("name")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old("description") ?? $project->description}}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Link</label>
                <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" value="{{old("link") ?? $project->link}}">
                @error("link")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Type</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type" value="{{old("type") ?? $project->type}}">
                    @foreach ($data as $type)
                        <option value="{{$type->id}}">
                            {{$type->name}}
                        </option>
                    @endforeach
                </select>

                <div class="d-flex mt-3">
                    @foreach ($technologies as $i => $technology)
                        <div class="form-check m-3">
                            <input type="checkbox" value="{{old("$technology->id") ?? $technology->id}}" name="technologies[]" id="technologies{{$i}}" class="form-check-input" >
                            <label for="technologies{{$i}}" class="form-check-label">{{$technology->name}}</label>
                        </div>
                    @endforeach
                </div>

                <input class="form-control mt-4 btn btn-secondary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection
