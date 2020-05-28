@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-primary" style="width:15%;border-radius:    5px;">Go back</a>
    <div class="job-offer-section">
    <div class="container w-container">
    <h1 style="text-align:center">{{$post->title}}</h1>
      <div class="view-job-wrappe">
        <div class="h2-bold margin-bottom-10">{{$post->title}}</div>
        <div class="h3 margin-bottom-10">{{$post->companyName}}</div>
        <div class="paragraph">{{$post->body}}</div>
      <div class="view-job-wrappe">
        <div class="h3-bold margin-bottom-10">{{$post->city}}</div>
        <div class="h3-bold margin-bottom-10">Required skills:</div>
        <div class="paragraph">{{$post->requiredSkills}}</div>
        <div class="h3-bold margin-bottom-10">Salary:</div>
        <div class="paragraph">{{$post->salary}}</div>
        <div class="h3-bold margin-bottom-10">Job Type:</div>
        <div class="paragraph">{{$post->type}}</div>
        <div class="h3-bold margin-bottom-10">Creation Date:</div>
        <div class="paragraph">{{$post->created_at->format('Y-m-d')}}</div>
        <div class="h3-bold margin-bottom-10">End Date:</div>
        <div class="paragraph">{{$post->end_at}}</div>
        <small>Created at {{$post->created_at->format('Y-m-d')}} by <b>{{$post->user->name}}</b></small>
      </div>
    </div>
  </div>
  <br>
  @if(!Auth::guest() && Auth::user()->id == $post->user->id)
  <a href='/posts/{{$post->id}}/edit' class="btn btn-primary float-left">Edit</a>

    {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'btn pull-right float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}
    @endif
@endsection