@extends('layouts.home')

@section('title')
    Data Detail Buku
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Ubah Data Buku {{$var_buku->judul_buku}}</h1>
          <p class="mb-4">Berikut merupakan detail data buku {{$var_buku->judul_buku}}</p>
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Data Buku</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                 <form class="user" method="POST" action="{{route('proses_edit_buku')}}" >
                @csrf
                <input type="hidden" name="id" value="{{$var_buku->id}}" >
                <div class="form-group">
                   <select id="kategori" type="text" class="form-control " name="kategori" value="{{ old('kategori') }}" required>
                    @foreach ($var_kategori as $kategori)
                        @if ($var_buku->id_kategori == $kategori->id_kategori)
                        <option value="{{$kategori->id_kategori}}" selected>{{$kategori->nama_kategori}}</option>
                        @else
                         <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                        @endif
                    @endforeach
                   </select>
                    @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                   <input id="name" type="text" class="form-control form-control-user " name="name" required autocomplete="name" autofocus placeholder="Judul Buku..."  value="{{$var_buku->judul_buku}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="pengarang" type="text" class="form-control form-control-user"  name="pengarang" required autocomplete="pengarang" placeholder="Nama Pengarang..."  value="{{$var_buku->nama_pengarang}}">
                    @error('pengarang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group">
                  <input id="penerbit" type="text" class="form-control form-control-user"  name="penerbit"  required autocomplete="penerbit" placeholder="Nama Penerbit..."  value="{{$var_buku->nama_penerbit}}">
                    @error('penerbit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group">
                  <input id="tebal" type="text" class="form-control form-control-user"  name="tebal" required autocomplete="tebal" placeholder="Jumlah Halaman..."  value="{{$var_buku->ketebalan}}">
                    @error('tebal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                     <input id="thn_terbit" type="text" class="form-control form-control-user" onfocus="(this.type='date')" onblur="(this.type='text')" name="thn_terbit" required autocomplete="thn_terbit" placeholder="Tahun Terbit..."  value="{{$var_buku->tahun_terbit}}">
                      @error('thn_terbit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 </div>
                 <div class="form-group">
                  <input id="edisi" type="text" class="form-control form-control-user"  name="edisi"  required autocomplete="edisi" placeholder="Edisi Buku..."  value="{{$var_buku->edisi_buku}}">
                    @error('edisi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="jumlah" type="text" class="form-control form-control-user"  name="jumlah"  required autocomplete="jumlah" placeholder="Jumlah Buku..."  value="{{$var_buku->jumlah_buku}}">
                    @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                <a href="/buku"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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
