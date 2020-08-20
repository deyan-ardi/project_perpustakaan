@extends('layouts.home')

@section('title')
    Data User {{Auth::user()->name}}
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Ubah Data User {{Auth::user()->name}}</h1>
          <p class="mb-4">Berikut merupakan detail data user {{Auth::user()->name}}</p>
         <!-- Collapsable Card Example -->
        @if(Session::has('gagal'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Form Data User</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                 <form class="user" method="POST" action="{{route('proses_edit_user')}}" >
                @csrf
                <input type="hidden" name="id" value="{{Auth::user()->id}}" >
                <div class="form-group">
                   <input id="name" type="text" class="form-control form-control-user " name="name" required autocomplete="name" autofocus placeholder="Judul Buku..."  value="{{Auth::user()->name}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="email" type="text" class="form-control form-control-user"  name="email" required autocomplete="email" placeholder="Email..."  value="{{Auth::user()->email}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group">
                  <input id="password" type="password" class="form-control form-control-user"  name="password"  required autocomplete="password" placeholder="Konfirmasi Password...">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                <a href="/home"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
                  </div>
                </div>
              </div>

            </div>

          </div>
        <!-- /.container-fluid -->
@endsection
