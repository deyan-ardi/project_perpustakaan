@extends('layouts.home')

@section('title')
    Data Kategori Buku
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Ubah Data Kategori {{$var_kategori->nama_kategori}}</h1>
          <p class="mb-4">Berikut merupakan detail data kategori {{$var_kategori->nama_kategori}}</p>
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Data Kategori</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                  <form class="user" method="POST" action="{{route('proses_edit_kategori')}}" >
                  @csrf
                <div class="form-group">
                <input type="hidden" name="id" value="{{$var_kategori->id_kategori}}">
                   <input id="name" type="text" class="form-control form-control-user " name="name" value="{{ $var_kategori->nama_kategori}}" required autocomplete="name" autofocus placeholder="Nama Kategori...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="deskripsi" type="text" class="form-control form-control-user"  name="deskripsi" value="{{ $var_kategori->deskripsi }}" required autocomplete="deskripsi" placeholder="deskripsi Tinggal...">
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <a href="{{route('kategori_buku')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                    <button type="submit" class="btn btn-primary">Save changes</button>

              </form>
                  </div>
                </div>
              </div>

            </div>

          </div>
        <!-- /.container-fluid -->
@endsection
