@extends('layout.app')
@section('title' , 'Edit Books')
@section('content')

<div class="content">

    <h3>Edit Books</h3>

    
    <form action="/books/{{ $book->id}}" enctype="multipart/form-data" method="POST" >
    @method('patch')
    @csrf
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >NameBook</label>
                  <div class="col-sm-10">
                    <input type="text" name="namebook" id="namebook" class="form-control round-form @error('namebook') is-invalid @enderror"value="{{$book->namebook}}">
                    @error('namebook')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >AuthorBook</label>
                  <div class="col-sm-10">
                    <input type="text" name="authorbook" id="authorbook" class="form-control round-form @error('authorbook') is-invalid @enderror"value="{{$book->authorbook}}">
                    @error('authorbook')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" id="price" class="form-control round-form @error('price') is-invalid @enderror"value="{{$book->price}}">
                    @error('price')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" id=description"" cols="30" class="form-control round-form @error('description') is-invalid @enderror" rows="10"> {{ $book->description }} </textarea>
                    @error('description')
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
     

                  <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" >Launching</label>
                  <div class="col-sm-10">
                    <input type="text" name="launching" id="launching" class="form-control round-form @error('launching') is-invalid @enderror"value="{{$book->launching}}">
                    @error('launching')
              <div class="invalid-feedback">
                {{$message}}
            </div>
              @enderror
                  </div>
         
        </div>
        <div class="row justify-content-center button">
                    <a href="/books"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                    <button type="submit" class="btn btn-success btn-sm ml-3"><i class="fas fas-edit"></i>Update</button>
                </div>
    </form>

</div>

@endsection