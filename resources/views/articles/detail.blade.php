@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <h2 class="card-title">{{ $article->title }}</h2>
            <div class="card-subtitle mb-2 text-muted small">
                {{$article->created_at->diffForHumans()}}
            </div>
           <div class="card-body">
               <p class="card-text">{{$article->body}}</p>

               <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-primary">
                   Edit
               <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-warning">
                   Delete
               </a>
           </div>
        </div>
    </div>

@endsection
