@extends('layouts.admin')

@section('content')
<div class="container container-show show p-5 d-flex">
    <div class="row">
        <div class="col">
            <h1>{{ $project->name }}</h1>
            <span>Program: {{ $project->description}}</span> <br>
        </div>
    </div>
    <div class="col ms-5">
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
    </div>
</div>
<a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
<a class="btn btn-primary mt-5" href="{{ route('admin.projects.index') }}">HOME</a>
@endsection