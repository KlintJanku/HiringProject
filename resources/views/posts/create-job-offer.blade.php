@extends('layouts.app')
@section('content')
    

        {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}
<div class="section-signin">
    <div class="container w-container">
      <div class="postjob-div">
        <div class="form-wrapper">
            <div class="form-block w-form">
            <h1>Crete Post</h1>
            <div class="post-job-wrapper margin-bottom-20">
            <div class="post-job-left-div padding-right-20">
                {{Form::label('title' ,"Title", ['class' => 'field-label'])}}
                {{Form::text('title', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a Job Title'])}}
                {{Form::label('body' ,"Description", ['class' => 'field-label'])}}
                {{Form::textarea('body', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Job Details', 'rows' => '3'])}}
                {{Form::label('salary' ,"Salary /hr", ['class' => 'field-label'])}}
                {{Form::text('salary', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter a Salary'])}}
                {{Form::label('requiredSkills' ,"Required Skills", ['class' => 'field-label'])}}
                {{Form::text('requiredSkills', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter requirements'])}}
                {{Form::label('type' ,"Type", ['class' => 'field-label'])}}
                {{Form::select('type', ['Permanent' => 'Permanent', 'Contract' => 'Contract', 'Intership' => 'Intership', 'Freelance'=> 'Freelance'], null ,['class' => 'w-select ', 'placeholder' => 'Select One'])}}
            </div>
            <div class="post-job-right-div">
                {{Form::label('companyName' ,"Company Name", ['class' => 'field-label'])}}
                {{Form::text('companyName', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter your Company Name'])}}
                {{Form::label('companyDescription' ,"Company Description", ['class' => 'field-label'])}}
                {{Form::textarea('companyDescription', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'About your Company', 'rows' => '3'])}}
                {{Form::label('city' ,"City", ['class' => 'field-label'])}}
                {{Form::text('city', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter City'])}}
                {{Form::label('end_at' ,"End Date", ['class' => 'field-label'])}}
                {{Form::date('end_at', '' , ['class' => 'field-control  padding-right-20 text-field w-input', 'placeholder' => 'Enter End Date'])}}
            </div> 
            </div>
            {{Form::submit('Post Job', ['class' => 'btn btn-primary'])}}
            </div>
    </div>
    </div>
    </div>
    </div>
        {{ Form::close() }}
@endsection