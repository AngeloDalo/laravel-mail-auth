@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    All Projects
                </h1>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Description</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->decription }}</td>
                                <td>{{ $project->updated_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}">View</a></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project->slug) }}">Update</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection