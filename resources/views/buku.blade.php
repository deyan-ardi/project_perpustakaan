@extends('layouts.home')

@section('title')
    Data Buku
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
          <p class="mb-4">Berikut merupakan data buku berdasarkan kategori buku di perpustakaan Konoha Library</p>
        @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
          <div class="row">
            @foreach ($var_kategori as $kategori)
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kategori {{$kategori->nama_kategori}}</div>
                    @php
                        $i = 1;
                    @endphp
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$buku = DB::table('buku')->where('id_kategori', '=', $kategori->id_kategori)->count()}} Buku</div>
                    @php
                    $i++
                    @endphp
                    <a href="detail_buku/{{$kategori->id_kategori}}" class="mt-3 btn btn-secondary btn-sm btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    <span class="text">Lihat Detail</span>
                  </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- end card --}}
             @endforeach
        </div>
        <!-- /.container-fluid -->
@endsection
