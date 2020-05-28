@extends('layouts.app')
@section('content')
    
    <div class="jobsearch-content margin-top-100">
    <div class="container-stretch w-container">
      <div class="resume-div">
        <div class="profile-wrapper"><img src="/storage/profile_image/{{$cv->profile_image}}" alt="" class="image-2">
          <div class="profile-details-div relative">
            <div class="h2-bold">{{$cv->name}}</div>
            <div class="h3-bold">{{$cv->job_title}}</div>
            <div class="h3">{{$cv->city}}</div>
            <div class="h3">{{$cv->email}}</div>
            <div class="h3">{{$cv->number}}</div><a href="#" class="edit-info w-inline-block"><img src="images/edit-btn.svg" alt="" class="image-3"></a></div>
          <div class="profile-details-div relative">
            <div class="h2-bold">About Me</div>
            <div class="profile-details-txt end">{{$cv->about_me}}</div><a href="#" class="edit-info w-inline-block"><img src="images/edit-btn.svg" alt="" class="image-3 about-me"></a></div>
          <div class="profile-details-div relative">
            <div class="h2-bold">Skills</div>
            <div class="paragraph">{{$cv->required_skills}}</div>
            <div class="_80-wrapper"></div>
            <a href="#" class="edit-info w-inline-block"><img src="images/edit-btn.svg" alt="" class="image-3 about-me"></a>
            </div>
        </div>
        <div class="experience-wrapper">
          <div class="h1 orange">CV</div>
          <div class="past-employment-div"><a href="#" class="edit-info w-inline-block"></a>
            <div class="h2-bold">Work Experience</div>
            <div class="experience-details-div no-top-margin">
              <div class="paragraph">{{$cv->work_experience}}</div>
            </div>
          </div>
          <div class="past-employment-div"><a href="#" class="edit-info w-inline-block"><img src="images/edit-btn.svg" alt="" class="image-3 work-exp"></a>
            <div class="h2-bold">Education</div>
            <div class="experience-details-div no-top-margin">
              <div class="profile-details-txt end">{{$cv->education}}</div>
            </div>
          </div>
  <a href='/c_v_s/{{$cv->id}}/edit' class="btn btn-primary float-left">Edit</a>
    {!! Form::open(['action' => ['CVController@destroy', $cv->id],'method' => 'POST', 'class' => 'btn pull-right float-right']) !!}
         {{Form::hidden('_method', 'DELETE')}}
         {{Form::submit('Delete',['class' => 'btn btn-danger float-right'])}}
    {!! Form::close() !!} 
          </div>

@endsection



