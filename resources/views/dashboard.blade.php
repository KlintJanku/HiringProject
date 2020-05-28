@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(Auth::check() && Auth::user()->accountType == 'company')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Posts</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>{!! Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'btn pull-right ']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You don't have any Posts</p>
                    @endif
                </div>
                @else
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/c_v_s/create" class="btn btn-primary">Create CV</a>
                    <h3>Your CVs</h3>
                    @if(count($cv) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($cv as $c)
                            <tr>
                                <td>{{$c->name}}</td>
                                <td><a class="btn btn-success" href="/c_v_s/{{$c->id}}">View CV</td>
                                <td><a href="/c_v_s/{{$c->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>{!! Form::open(['action' => ['CVController@destroy', $c->id],'method' => 'POST', 'class' => 'btn pull-right ']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You don't have any CV</p>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
