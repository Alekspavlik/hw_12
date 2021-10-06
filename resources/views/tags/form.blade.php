@extends('layout')

@section('title', 'Теги')

@section('body')
    <a href="/">Admin</a>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" @isset($tag) value="{{ $tag->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" @isset($tag) value="{{ $tag->slug }}" @endisset>
        </div>

        @isset($tag)
            <input type="hidden" name="id" value="{{ $tag->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection