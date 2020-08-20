@extends('layouts.home')

@section('title')
    Data Kategori Buku
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Kategori Buku</h1>
          <p class="mb-4">Berikut merupakan data kategori buku yang ada di perpustakaan Konoha Library</p>
        @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kategori Buku 2.0.1</h6>
            </div>
            <div class="card-body">
                  <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Data Kategori</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Deskripsi Kategori</th>
                      <th>Dibuat Pada</th>
                      <th>Edit Data</th>
                      <th>Hapus Data</th>

                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($var_kategori as $kategori)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$kategori->nama_kategori}}</td>
                        <td>{{$kategori->deskripsi}}</td>
                        <td>{{$kategori->updated_at}}</td>
                        <td>
                        <a href="ubah_kategori/{{$kategori->id_kategori}}" class="btn btn-success btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Ubah</span>
                            </a>
                      </td>
                      <td>
                            <a href="hapus_kategori/{{$kategori->id_kategori}}" id="tombol-hapus" class=" btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                            </a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
         <!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModal">Input Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="POST" action="{{route('insert_new_kategori')}}">
                  @csrf
                <div class="form-group">
                   <input id="name" type="text" class="form-control form-control-user " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Kategori...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="deskripsi" type="text" class="form-control form-control-user"  name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" placeholder="Deskripsi Kategori...">
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
      </div>

    </div>
  </div>
</div>
@endsection
