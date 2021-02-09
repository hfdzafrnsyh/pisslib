@extends('layout.app')
@section('title' , 'Password')
@section('content')

<div class="content">
    <h3>Change Password</h3>

    
    <div class="session">
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            </div>
 
            <div class="form-password">
                <form action="/userprofile/{{ auth()->user()->id }}" enctype="multipart/form-data" method="POST" >
                        @method('patch')
                        @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" >Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" required id="old_password" class="form-control round-form @error('old_password') is-invalid @enderror">
                                        @error('old_password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                    </div>
                            
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" >New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="new_password" required id="new_password" class="form-control round-form @error('new_password') is-invalid @enderror">
                                        @error('new_password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                    </div>
                            
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" >Repeat Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="repeat_password" id="repeat_password"  required class="form-control round-form @error('repeat_password') is-invalid @enderror">
                                        @error('repeat_pasword')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                    </div>
                            
                            </div>
                         
                        
                            <div class="row justify-content-center button">
                                <a href="/userprofile/{{ auth()->user()->id }}"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                                <button type="submit" class="btn btn-success btn-sm ml-3"><i class="fas fas-edit"></i>Update</button>
                            </div>
                        </form>
                </div>
</div>
@endsection