@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>My Projects - edit</h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input value="{{ old('title', $project->title) }}" required type="text" id="title" name="title"
                class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="description">Description</label>
            <textarea rows="8" id="description" name="description"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="image">Image</label>
            <input value="{{ old('image', $project->image) }}" type="url" id="image" name="image"
                class="form-control @error('description') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="url">Url</label>
            <input value="{{ old('url', $project->url) }}" required type="url" id="url" name="url"
                class="form-control @error('description') is-invalid @enderror">
            @error('url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="tecnologies">Used tecnologies</label>
            <input value="{{ old('tecnologies', $project->tecnologies) }}" type="text" id="tecnologies"
                name="tecnologies" class="form-control @error('description') is-invalid @enderror">
            @error('tecnologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Save</button>
            <input type="reset" class="btn btn-warning">
        </form>
    </section>
@endsection
