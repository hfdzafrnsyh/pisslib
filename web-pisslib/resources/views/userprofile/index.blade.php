@extends('layout.app')
@section('title' , 'Profile')
@section('content')

<div class="content">
    <h3>Profile</h3>

    
    <div class="card shadow mb-4 ">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3 bg-dark" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary ">{{ $user->email}}</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                  <div class="card-body">
              <div class="row">
              
               <div class="col-lg-6">
               <div class="text-center">
                      <img src="{{ asset('wp-pisslib/image/' . $user->image ) }}" alt="" style="width:250px">
                  </div>
               </div>
               <div class="col-lg-6 text-primary">
                   <h5>Name : {{ $user->name }}</h5>
               </div>

                  </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center button">

                <a href="/home"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>
                <a href="/userprofile/{{ auth()->user()->id }}/changepassword" class="ml-3 text-success"><i class="fas fa-edit fa-2x"></i>Password</a>
              </div>
  
</div>
@endsection