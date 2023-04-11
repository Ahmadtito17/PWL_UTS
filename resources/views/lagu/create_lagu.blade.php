@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Lagu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Lagu</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Lagu</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ $url_form }}">
        @csrf
        {!! (isset($lagu))? method_field('PUT') : '' !!}
        <div class="form-group">
          <label>Judul</label>
          <input class="form-control @error('judul') is-invalid @enderror" value="{{ isset($lagu)? $lagu->judul: old('judul') }}" name="judul" type="text" />
          @error('judul')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Artis</label>
          <input class="form-control @error('artis') is-invalid @enderror" value="{{ isset($lagu)? $lagu->artis: old('artis') }}" name="artis" type="text"/>
          @error('artis')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Genre</label>
          <input class="form-control @error('genre') is-invalid @enderror" value="{{ isset($lagu)? $lagu->genre: old('genre') }}" name="genre" type="text"/>
          @error('genre')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tanggal Rilis</label>
          <input class="form-control @error('tanggal_rilis') is-invalid @enderror" value="{{ isset($lagu)? $lagu->tanggal_rilis: old('tanggal_rilis') }}" name="tanggal_rilis" type="text"/>
          @error('tanggal_rilis')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection