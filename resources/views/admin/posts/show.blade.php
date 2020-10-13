@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    {{$post->title}}
                </h1>
                <small>{{$post->created_at}}</small>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{route('posts.show', ['post' => $post->slug])}}" target="_blank">
                    {{route('posts.show', ['post' => $post->slug])}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! $post->content !!}
            </div>
        </div>
    </div>
@stop
