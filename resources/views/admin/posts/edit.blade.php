@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{trans('ui.post_creation')}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('admin.posts.update', ['post' => $post])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">{{trans('ui.title')}}</label>
                        <input type="text" name="title" class="form-control" id="title"
                               value="{{old('title', $post->title)}}">
                    </div>
                    <div class="form-group">
                        <label for="content_md">{{trans('ui.content')}}</label>
                        <textarea name="content_md" id="content_md" cols="30"
                                  rows="10">{{old('content_md', $post->content_md)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{trans('ui.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
@stop
