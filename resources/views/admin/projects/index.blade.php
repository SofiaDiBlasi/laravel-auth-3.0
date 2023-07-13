@extends('layouts.admin')

@section('content')
<div class="container-fluid my-3">
    <div class="row g-4 align-items-center justify-content-between">
        <div class="col-3">
            <h1>Lista Progetti</h1>
        </div>
        <div class="col-3">
            <div>
                <a class="btn btn-secondary" href="{{ route("admin.projects.create") }}">
                    <i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi un nuovo progetto
                </a>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col">
            <ul  class="list-group">
                @foreach ($data as $project)
                    <li class="list-group-item">
                        <a class="link-secondary link-underline link-underline-opacity-0 link-opacity-25-hover" href="{{ route("admin.projects.show", $project->id) }}">{{$project->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
