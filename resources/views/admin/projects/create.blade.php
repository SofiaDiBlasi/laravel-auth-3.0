@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <h1>Aggiungi progetto</h1>

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
            <form action="{{ route("admin.projects.store") }}" method="post" class="needs-validation">
                @csrf

                <label>Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old("name") }}">
                @error("name")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old("description") }}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Link</label>
                <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" value="{{old("link")}}">
                @error("link")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Type</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type" value="{{old("type")}}">
                    @foreach ($data as $type)
                        <option value="{{$type->id}}">
                            {{$type->name}}
                        </option>
                    @endforeach
                </select>

                @error("link")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <input class="form-control mt-4 btn btn-secondary" type="submit" value="Invia">
             </form>
        </div>
    </div>
</div>
@endsection
