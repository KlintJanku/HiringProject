@extends('layouts.app')
@section('content')
    

        {{ Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) }}
<div class="section-signin">
    <div class="container w-container">
      <div class="postjob-div">
        <div class="form-wrapper">
            <div class="form-block w-form">
            <h1>Edit Post</h1>
            <div class="post-job-wrapper margin-bottom-20">
            <div class="post-job-left-div padding-right-20">
                {{Form::label('title' ,"Title", ['class' => 'field-label'])}}
                {{Form::text('title', $post->title , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a Job Title'])}}
                {{Form::label('body' ,"Description", ['class' => 'field-label'])}}
                {{Form::textarea('body', $post->body , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a job Details', 'rows' => '3'])}}
                {{Form::label('salary' ,"Salary /hr", ['class' => 'field-label'])}}
                {{Form::text('salary', $post->salary , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a Salary'])}}
                {{Form::label('requiredSkills' ,"Required Skills", ['class' => 'field-label'])}}
                {{Form::text('requiredSkills', $post->requiredSkills , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter requirements'])}}
                {{Form::label('type' ,"Type", ['class' => 'field-label'])}}
                {{Form::select('type' ,['Permanent' => 'Permanent', 'Contract' => 'Contract', 'Intership' => 'Intership', 'Freelance'=> 'Freelance'], null ,['class' => 'w-select ', 'placeholder' => 'Select One'])}}
            </div>
            <div class="post-job-right-div">
                {{Form::label('companyName' ,"Company Name", ['class' => 'field-label'])}}
                {{Form::text('companyName', $post->companyName , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter your Company Name'])}}
                {{Form::label('city' ,"City", ['class' => 'field-label'])}}
                {{Form::text('city', $post->city , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter City'])}}
            </div> 
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update Job', ['class' => 'btn btn-primary'])}}
            </div>
    </div>
    </div>
    </div>
    </div>
        {{ Form::close() }}
@endsection