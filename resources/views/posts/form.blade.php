@extends('layout')



@section('title', 'Посты')

@section('body')
    <a href="/">Admin</a>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" @isset($post) value="{{ $post->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" @isset($post) value="{{ $post->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" name="body" class="form-control" id="body" @isset($post) value="{{ $post->body }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categories</label>
            <select class="form-select" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag" class="form-label">Tags</label>
            <select class="form-select" name="tag[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        @isset($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection