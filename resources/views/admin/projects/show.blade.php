@extends('layouts.admin')

@section('content')
<div class="container my-3">

    <div class="row g-4 align-items-center justify-content-between">
        <div class="col-8">
            <a class="btn btn-secondary" href="{{ route("admin.projects.index") }}">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Torna alla lista progetti
            </a>
            <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project) }}">
                <i class="fa fa-pencil" aria-hidden="true"></i> Modifica questo progetto
            </a>
        </div>
        <div class="col-3 d-flex justify-content-end">
            <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash" aria-hidden="true"></i> Cancella il progetto
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row g-4">
        <div class="col">
            <div>
                <div class="card p-2">
                    <h1>{{$project->name}}</h1>
                    <p>{{ $project->description}}</p>
                    <?php if($project->type != null ){ ?>
                        <p>{{ $project->type->name}}</p>
                    <?php } ?>
                    <img width="400px" height="400px" src="{{$project->link}}" alt="{{$project->name}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
