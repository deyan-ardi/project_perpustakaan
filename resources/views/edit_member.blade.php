@extends('layouts.home')

@section('title')
    Data Member
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Ubah Data Member {{$var_member->nama_member}}</h1>
          <p class="mb-4">Berikut merupakan detail data member {{$var_member->nama_member}}</p>
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Data Member</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                        <form class="user" method="POST" action="{{route('proses_edit_member')}}">
                  @csrf
                <div class="form-group">
                <input type="hidden" name="id" value="{{$var_member->id_member}}">
                   <input id="name" type="text" class="form-control form-control-user " name="name" value="{{ $var_member->nama_member}}" required autocomplete="name" autofocus placeholder="Nama Member...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="alamat" type="text" class="form-control form-control-user"  name="alamat" value="{{ $var_member->alamat }}" required autocomplete="alamat" placeholder="Alamat Tinggal...">
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="no_telp" type="text" value="{{$var_member->no_telp}}" class="form-control form-control-user " name="no_telp" required autocomplete="no_telp" placeholder="No Telepon...">
                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-sm-6">
                  <input id="tgl_lahir" type="text" value="{{$var_member->tgl_lahir}}" class="form-control form-control-user" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_lahir" required autocomplete="tgl_lahir" placeholder="Tanggal Lahir...">
                      @error('tgl_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                </div>

            <a href="{{route('member')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                    <button type="submit" class="btn btn-primary">Save changes</button>

              </form>
                  </div>
                </div>
              </div>

            </div>

          </div>
        <!-- /.container-fluid -->
@endsection
