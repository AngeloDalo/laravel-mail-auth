@extends('layouts.admin')

@section('content')
<div class="container p-5">
  <div class="row">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
  </div>
    <div class="row">
      <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
        @csrf
        @method('POST')
        <div class="mb-3 mt-3">
          <label for="name" class="form-label text-uppercase fw-bold">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="descriptopm" class="form-label text-uppercase fw-bold">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{--inserimento di un image file--}}
        <div class="mb-3">
          <label for="image" class="form-label text-uppercase fw-bold">Image</label>
          <input class="form-control" type="file" id="image" name="image">
        </div>
        @error('image')
          <div class="alert alert-danger mt-3"> {{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
@endsection