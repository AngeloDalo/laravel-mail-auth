@extends('layouts.admin')

@section('content')
<div class="row">
  @if (session('status'))
      <div class="alert alert-danger">
          {{ session('status') }}
      </div>
  @endif
</div>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase">Edit Project: {{ $project->name }}</h2>
                <a class="btn btn-primary" href="{{route('admin.projects.index')}}">HOME</a>
                <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">VIEW</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label text-uppercase fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
                        @error('nome')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-uppercase fw-bold">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $project->description }}">
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                      @if (!empty($project->image))
                      <div class="mb-3">
                          <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}"
                              alt="{{ $project->name }}">
                      </div>
                      @endif
                      <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
              
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection