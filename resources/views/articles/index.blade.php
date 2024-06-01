@extends('layouts.app')
@section('content')
    {{$articles->links()}}
    <div class="container">
        @session('info')
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endsession

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endsession
        @foreach($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <div class="card-subtitle mb-2 text-muted text-small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text">{{ $article->body }}</p>
                    <a href="{{ url("/articles/detail/$article->id") }}" class="card-link"> View Detail &raquo;</a>
                </div>
            </div>

        @endforeach
    </div>

@endsection
