@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    {{$post->title}}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! $post->content !!}
            </div>
        </div>
    </div>
@stop
