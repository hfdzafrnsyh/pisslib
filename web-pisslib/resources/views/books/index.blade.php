@extends('layout.app')
@section('title' , 'Books')
@section('content')

    <div class="content">

        <h3>Data Books</h3>
                                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-3 mb-3 btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Books
                </button>
                <div class="data-book">

            <div class="session">
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            </div>


            <table class="table table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NameBook</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                
                
            </tr>
            </thead>
            <tbody>
            @foreach($book as $books)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $books->namebook}}</td>
                <td>{{ $books->authorbook}}</td>
                <td>{{ $books->price}}</td>
                <td>
                    <img src="{{asset('wp-pisslib/image/books/' .$books->image )}}" style="width:30px;" alt="">

                </td>
                <td>
            
                
                <a href="/books/{{ $books->id}}/detail" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-info"></i>
                    </a>

                    <a href="/books/{{ $books->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                </a>

                <form action="/books/{{ $books -> id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus?');"class="btn btn-danger btn-circle btn-sm justify-content-end"><i class="fas fa-trash "></i></button>
                            </form>
                        
                </td>
            </tr>

            @endforeach
            </tbody>
            </table>

                <div class="pagination justify-content-center">
                {{ $book->links() }}
                </div>

            </div>



                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       
                        <form action="/books/create" enctype="multipart/form-data" method="POST" >
                        @method('post')
                        @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" >NameBook</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namebook" required id="namebook" class="form-control round-form @error('namebook') is-invalid @enderror">
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
                                        <input type="text" name="authorbook" required id="authorbook" class="form-control round-form @error('authorbook') is-invalid @enderror">
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
                                        <input type="text" name="price" id="price"  required class="form-control round-form @error('price') is-invalid @enderror">
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
                                        <textarea name="description" id="description" required cols="30" class="form-control round-form @error('description') is-invalid @enderror" rows="5"> </textarea>
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
                                        <input type="text" name="launching" id="launching" required class="form-control round-form @error('launching') is-invalid @enderror">
                                        @error('launching')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                    </div>
                            
                            </div>
                                    <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                               
                                </div>
                                
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>

    </div>

@endsection