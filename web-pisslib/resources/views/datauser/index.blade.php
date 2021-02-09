@extends('layout.app')
@section('title' , 'Datauser')
@section('content')

    <div class="content">

        <h3>Datauser</h3>

        <div class="data-table">

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
            <th scope="col">User_ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">isAdmin</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
        @foreach($user as $usr)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $usr->id}}</td>
            <td>{{ $usr->name}}</td>
            <td>{{ $usr->email}}</td>
            <td>{{ $usr->isAdmin}}</td>
            <td>
                <img src="{{ asset('wp-pisslib/image/' . $usr->image ) }}" style="width:50px;" alt="">

            </td>
            <td>
          
            
            <a href="/datauser/{{ $usr->id}}/detail" class="btn btn-info btn-circle btn-sm">
                          <i class="fas fa-info"></i>
                </a>

                <a href="/datauser/{{ $usr->id}}/edit" class="btn btn-warning btn-circle btn-sm">
                          <i class="fas fa-edit"></i>
              </a>

              <form action="/datauser/{{ $usr->id}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus?');"class="btn btn-danger btn-circle btn-sm justify-content-end"><i class="fas fa-trash "></i></button>
                          </form>
                    
            </td>
          </tr>
        
        @endforeach
        </tbody>
    </table>

    </div>
    
      </div>

@endsection