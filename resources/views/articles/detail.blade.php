@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <h2 class="card-title">{{ $article->title }}</h2>
            <div class="card-subtitle mb-2 text-muted small">
                {{$article->created_at->diffForHumans()}}
                Category: <b>{{$article->category->name}}</b>
            </div>
            <div class="card-body">
                <p class="card-text">{{$article->body}}</p>

                <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-primary me-2">
                    Edit
                </a>
                <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-warning">
                    Delete
                </a>
            </div>

        </div>

        <div class="card mt-3">
            <ul class="list-group mb-2">
                <li class="list-group-item active">
                    <b>Comments: {{count($article->comments)}}</b>
                </li>
                @foreach($article->comments as $comment)
                    <li class="list-group-item ">
                        {{$comment->content}}
                        <div class="small mt-2">
                            By <b>{{$comment->user->name}}</b>
                            {{$comment->created_at->diffForHumans()}}
                        </div>
                        <a class="small text-end text-danger" href="{{url("/comments/delete/$comment->id")}}">
                            Delete
                        </a>
                    </li>
                @endforeach
            </ul>
            @auth()

                <form action="{{route('comments.add')}}}" method="post">
                    @csrf
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <div class="mb-3">
                        <label for="content" class="form-label">Comment</label>
                        <textarea class="form-control" id="content" name="content" rows="3"
                                  placeholder="new comment"></textarea>
                    </div>
                    <input type="submit" class="btn btn-secondary" value="add-comment">
                </form>

            @endauth
        </div>
    </div>

@endsection
