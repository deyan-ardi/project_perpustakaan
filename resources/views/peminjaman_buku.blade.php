@extends('layouts.home')

@section('title')
    Manajemen Peminjaman
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
          <p class="mb-4">Berikut merupakan data peminjaman buku perpustakaan Konoha Library</p>

          @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
          @endif

          @if(Session::has('gagal'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manajemen Peminjaman 1.0.1</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Data Peminjaman</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Nama Buku</th>
                      <th>Kategori Buku</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Dikembalikan Tanggal</th>
                      <th>Lama Peminjaman</th>
                      <th>Denda</th>
                      <th>Administrasi</th>
                      <th>Total Biaya</th>
                      <th>Keadaan</th>
                      <th>Diterima Oleh</th>
                      <th>Set Keadaan</th>
                      <th>Hapus</th>

                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                      $j = 0;
                    @endphp
                    <tr>
                    @foreach ($var_peminjaman as $peminjaman)
                    <td>{{$i++}}</td>
                    <td class="text-capitalize">{{$peminjaman->nama_member}}</td>
                      <td class="text-capitalize">{{$peminjaman->judul_buku}}</td>
                      <th class="text-capitalize">{{$peminjaman->nama_kategori}}</th>
                      <td>{{$peminjaman->created_at}}</td>
                    {{-- updated_at --}}
                    @if ($peminjaman->updated_at == $peminjaman->created_at)
                            <td class="text-center">-</td>
                    @else
                            <td>{{$peminjaman->updated_at}}</td>
                    @endif
                    {{-- lama --}}
                    @if($peminjaman->lama == null)
                        <td class="text-center">-</td>
                    @else
                        <td>{{$peminjaman->lama}} Hari</td>
                    @endif
                    {{-- denda --}}
                    @if($peminjaman->denda == null)
                        <td class="text-center">-</td>
                    @else
                        <td>Rp.{{$peminjaman->denda}} </td>
                    @endif
                    {{-- administrasi --}}
                    @if($peminjaman->administrasi == null)
                        <td class="text-center">-</td>
                    @else
                        <td>Rp.{{$peminjaman->administrasi}} </td>
                    @endif
                    {{-- total biaya --}}
                    @if($peminjaman->total_biaya == null)
                        <td class="text-center">-</td>
                    @else
                        <td>Rp. {{$peminjaman->total_biaya}} </td>
                    @endif

                      <td>{{$peminjaman->keadaan}} </td>
                    {{-- pengupload --}}
                    @if($peminjaman->updated_by == null)
                        <td class="text-center">-</td>
                    @else
                         <td>{{$peminjaman->updated_by}} </td>
                    @endif
                      <td>
                        @if ($peminjaman->keadaan == "Belum Dikembalikan")
                            <a href="ubah_status/{{$peminjaman->id_peminjaman}}" class="btn btn-success btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Dikembalikan</span>
                            </a>
                        @else
                            <a href="{{route('peminjaman_buku')}}" class="btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Dikembalikan</span>
                            </a>
                        @endif
                      </td>
                      <td>
                            <a href="hapus_peminjaman/{{$peminjaman->id_peminjaman}}" id="tombol-hapus" type="submit"  class="btn btn-danger btn-icon-split btn-sm">
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
        <h5 class="modal-title" id="insertModal">Input Data Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="POST" action="{{route('insert_new_peminjaman')}}" >
                @csrf
                 <div class="form-group">
                   <select id="member" type="text" class="form-control" name="member" required>
                         <option value="">Pilih Member...</option>
                    @foreach ($var_member as $member)
                         <option value="{{$member->id_member}}">{{$member->nama_member}}</option>
                    @endforeach
                   </select>
                    @error('member')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                   <select id="buku" type="text" class="form-control" name="buku" required>
                         <option value="">Pilih Buku...</option>
                    @foreach ($var_buku as $buku)
                        @if ($buku->jumlah_buku <= 0)
                            <option disabled>{{$buku->judul_buku}} - {{$buku->nama_pengarang}} </option>
                        @else
                            <option value="{{$buku->id}}">{{$buku->judul_buku}} - {{$buku->nama_pengarang}} </option>
                        @endif
                    @endforeach
                   </select>
                    @error('buku')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="penginput" value="{{Auth::user()->id}}">
                <input type="hidden" name="penginput_nama" value="{{Auth::user()->name}}">
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
