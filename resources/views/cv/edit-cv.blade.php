@extends('layouts.app')
@section('content')
    

        {{ Form::open(['action' => ['CVController@update',$cv->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
<div class="section-signin">
    <div class="container w-container">
      <div class="postjob-div">
        <div class="form-wrapper">
            <div class="form-block w-form">
            <h1>Edit CV</h1>
            <div class="post-job-wrapper margin-bottom-20">
            <div class="post-job-left-div padding-right-20">
                {{Form::label('name' ,"Name", ['class' => 'field-label'])}}
                {{Form::text('name', $cv->name , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter your name'])}}
                {{Form::label('job_title' ,"Job Title", ['class' => 'field-label'])}}
                {{Form::text('job_title', $cv->job_title , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a job Details'])}}
                {{Form::label('city' ,"City", ['class' => 'field-label'])}}
                {{Form::text('city', $cv->city , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a Salary'])}}
                {{Form::label('email' ,"Email", ['class' => 'field-label'])}}
                {{Form::text('email', $cv->email , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter requirements'])}}
                {{Form::label('number' ,"Phone Number", ['class' => 'field-label'])}}
                {{Form::text('number', $cv->number , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter requirements'])}}
                {{Form::label('profile_image' ,"Profile Image", ['class' => 'field-label'])}}
                {{Form::file('profile_image')}}
            </div>
            <div class="post-job-right-div">
                {{Form::label('about_me' ,"About Me", ['class' => 'field-label'])}}
                {{Form::textarea('about_me', $cv->about_me , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter your Company Name', 'rows' => '2'])}}
                {{Form::label('required_skills' ,"Required Skills", ['class' => 'field-label'])}}
                {{Form::textarea('required_skills', $cv->required_skills , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter Company details', 'rows' => '2'])}}
                {{Form::label('work_experience' ,"Work Experience", ['class' => 'field-label'])}}
                {{Form::textarea('work_experience', $cv->work_experience , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter City', 'rows' => '2'])}}
                {{Form::label('education' ,"Education", ['class' => 'field-label'])}}
                {{Form::textarea('education', $cv->education , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter End Date', 'rows' => '2'])}}
            </div> 
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update CV', ['class' => 'btn btn-primary float-right'])}}
            </div>
    </div>
    </div>
    </div>
    </div>
        {{ Form::close() }}
@endsection