@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="job-listing-wrapper-right">
                <div class="job-offer-wrapper">
                    <a href="/posts/{{$post->id}}" class="browse-jobs-link w-inline-block" style="text-decoration:none;">
                        <div class="h2-bold margin-bottom-10">{!! $post->title !!}</div>
                    
                    <div class="h3 margin-bottom-10">Company: <b>{!! $post->companyName !!}</b></div>
                    <div class="h3 margin-bottom-10">{!! $post->salary !!}</div>
                    <div class="paragraph margin-bottom-10">{!! $post->body !!}</div>
                    <small>Created at {{$post->created_at->format('Y-m-d')}} by <b>{{$post->user->name}}</b></small>
                    </a>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts found</p>
    @endif
@endsection