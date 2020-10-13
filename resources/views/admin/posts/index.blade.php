@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">
                    {{trans('ui.create')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">
                            {{trans('ui.posts')}} <span class="paginate-items">({{$posts->count()}})</span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    {{trans('ui.title')}}
                                </th>
                                <th>
                                    {{trans('ui.preview')}}
                                </th>
                                <th>
                                    {{trans('ui.created_at')}}
                                </th>
                                <th>

                                </th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.posts.show', ['post' => $post->slug])}}">
                                            {{$post->title}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$post->preview}}
                                    </td>
                                    <td class="text-nowrap">
                                        {{$post->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.posts.edit', ['post' => $post])}}"
                                           class="btn-warning btn">
                                            {{trans('ui.edit')}}
                                        </a>
                                        <a href="{{route('admin.posts.show', ['post' => $post])}}"
                                           class="btn btn-primary">
                                            {{trans('ui.detail')}}
                                        </a>
                                        <button class="btn btn-danger"
                                                onclick="document.getElementById('post-{{$post->id}}-delete-form').submit()">
                                            {{trans('ui.delete')}}
                                        </button>
                                        <form id="post-{{$post->id}}-delete-form"
                                              action="{{route('admin.posts.destroy', ['post' => $post])}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
