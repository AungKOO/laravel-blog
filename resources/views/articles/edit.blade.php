@extends('layouts.app')
@section('content')

    <div class="container">
        @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>

        @endif

        <form method="post" action="{{route('articles.update', $article->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$article->title}}">
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" id="body" class="form-control" >
                    {{$article->body}}
                </textarea>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category["id"] }}">
                            {{$category["name"]}}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Update Article">

        </form>
    </div>
@endsection
