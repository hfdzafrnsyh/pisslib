@extends('layout.app')
@section('title' , 'Edit Datauser')
@section('content')

<div class="content">
    <h3>Edit Datauser</h3>



    <form action="/datauser/{{ $user->id}}" enctype="multipart/form-data" method="POST" >
    @method('patch')
    @csrf
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control round-form @error('name') is-invalid @enderror"value="{{$user->name}}">
                    @error('name')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >Email</label>
               
                <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control "value="{{$user->email}}" readonly>
                </div>
               
         
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label" >Role</label>
                  <div class="col-sm-10">
                    <input type="boolean" name="isAdmin" id="isAdmin" class="form-control round-form @error('isAdmin') is-invalid @enderror"value="{{$user->isAdmin}}">
                    @error('isAdmin')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        
        <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" id="image" class="form-control round-form">
                  </div>
                  </div>
     

        <div class="row justify-content-center button">
                    <a href="/datauser"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                    <button type="submit" class="btn btn-success btn-sm ml-3"><i class="fas fas-edit"></i>Update</button>
                </div>
    </form>
</div>

@endsection