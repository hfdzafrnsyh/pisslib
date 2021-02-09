@extends('layout.app')
@section('title' , 'Detail Datauser')
@section('content')

<div class="content">
    <h3>Detail Datauser</h3>


    <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">{{ $user->email }}</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                  <div class="card-body">
                  <p>Name : {{ $user->name }}</p>
                  <p>Role : {{ $user->isAdmin }}</p>
                  <div class="text-center">
                      <img src="{{ asset('wp-pisslib/image/' . $user->image ) }}" alt="" style="width:250px">
                  </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center button">

                <a href="/datauser"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>
              </div>
</div>

@endsection