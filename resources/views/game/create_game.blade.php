@extends('layouts.template')

@section('title')
    Game
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Game</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Game</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <form method="POST" action="{{ $url_form }}">
                    @csrf
                    {!! (isset($gm))? method_field('PUT') : '' !!}


                    <div class="form-group">
                      <label>Kode Game</label>
                      <input class="form-control @error('kode_game') is-invalid @enderror" value="{{ isset($gm)? $gm->kode_game : old('kode_game') }}" name="kode_game" type="text" />
                      @error('kode_game')
                        <span class="error invalid-feedback">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Nama Game</label>
                      <input class="form-control @error('nama_game') is-invalid @enderror" value="{{ isset($gm)? $gm->nama_game : old('nama_game') }}" name="nama_game" type="text"/>
                      @error('nama_game')
                        <span class="error invalid-feedback">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Creator</label>
                      <input class="form-control @error('creator_game') is-invalid @enderror" value="{{ isset($gm)? $gm->creator_game : old('creator_game') }}" name="creator_game" type="text"/>
                      @error('creator_game')
                        <span class="error invalid-feedback">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Harga Game</label>
                      <input class="form-control @error('harga_game') is-invalid @enderror" value="{{ isset($gm)? $gm->harga_game : old('harga_game') }}" name="harga_game" type="text"/>
                      @error('harga_game')
                        <span class="error invalid-feedback">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Tahun Rilis</label>
                      <input class="form-control @error('tahun_rilis') is-invalid @enderror" value="{{ isset($gm)? $gm->tahun_rilis : old('tahun_rilis') }}" name="tahun_rilis" type="text"/>
                      @error('tahun_rilis')
                        <span class="error invalid-feedback">{{ $message }} </span>
                      @enderror
                    </div>
        
        
        
                    <div class="form-group">
                      <button type="submit"  class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection