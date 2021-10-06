@extends('layout')

@section('title', 'Категории')

@section('body')
    <a href="/">Admin</a>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" @isset($category) value="{{ $category->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" @isset($category) value="{{ $category->slug }}" @endisset>
        </div>

        @isset($category)
            <input type="hidden" name="id" value="{{ $category->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection