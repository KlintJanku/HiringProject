@extends('layouts.app')
@section('content')
    

        {{ Form::open(['action' => 'CVController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
<div class="section-signin">
    <div class="container w-container">
      <div class="postjob-div">
        <div class="form-wrapper">
            <div class="form-block w-form">
            <h1>Create CV</h1>
            <div class="post-job-wrapper margin-bottom-20">
            <div class="post-job-left-div padding-right-20">
                {{Form::label('name' ,"Name", ['class' => 'field-label'])}}
                {{Form::text('name', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Name'])}}
                {{Form::label('job_title' ,"Job Title", ['class' => 'field-label'])}}
                {{Form::text('job_title', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Job Title'])}}
                {{Form::label('city' ,"City", ['class' => 'field-label'])}}
                {{Form::text('city', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'City'])}}
                {{Form::label('email' ,"Email", ['class' => 'field-label'])}}
                {{Form::text('email', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter Email'])}}
                {{Form::label('number' ,"Phone Number", ['class' => 'field-label'])}}
                {{Form::text('number', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter Phone Number'])}}
                {{Form::label('profile_image' ,"Profile Image", ['class' => 'field-label'])}}
                {{Form::file('profile_image')}}
            </div>
            <div class="post-job-right-div">
                {{Form::label('about_me' ,"About Me", ['class' => 'field-label'])}}
                {{Form::textarea('about_me', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'About Me', 'rows' => '2'])}}
                {{Form::label('required_skills' ,"Skills", ['class' => 'field-label'])}}
                {{Form::textarea('required_skills', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter your Skills', 'rows' => '2'])}}
                {{Form::label('work_experience' ,"Work Experience", ['class' => 'field-label'])}}
                {{Form::textarea('work_experience', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Work Experience', 'rows' => '2'])}}
                {{Form::label('education' ,"Education", ['class' => 'field-label'])}}
                {{Form::textarea('education', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Education', 'rows' => '2'])}}
            </div> 
            </div>
            {{Form::submit('Create CV', ['class' => 'btn btn-primary float-right'])}}
            </div>
    </div>
    </div>
    </div>
    </div>
        {{ Form::close() }}
@endsection