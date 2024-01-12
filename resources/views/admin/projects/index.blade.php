@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="py-4">Progetto di Oder Risi (<a href="https://github.com/IIODERII">GitHub profile</a>)</h1>
            <a href="{{ route('admin.projects.create') }}" style="max-width: 200px" class="fw-bold btn btn-primary">Aggiungi un
                nuovo
                progetto</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-dark table-striped table-hover my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Tecnologie</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ substr($project->description, 0, 75) . '...' }}</td>
                        <td>{{ str_replace('|', ', ', $project->tecnologies) }}</td>
                        <td><a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-success">Mostra</a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                class="d-inline" id="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white btn btn-danger cancel-button"
                                    data-item-title="{{ $project->title }}">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('partials.modal_delete')
@endsection
