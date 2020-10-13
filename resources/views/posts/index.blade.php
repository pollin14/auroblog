@extends('layouts.master')

@section('content')
    <div class="container">
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
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{route('posts.show', ['post' => $post->slug])}}">
                                            {{$post->title}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$post->preview}}
                                    </td>
                                    <td class="text-nowrap">
                                        {{$post->created_at}}
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
