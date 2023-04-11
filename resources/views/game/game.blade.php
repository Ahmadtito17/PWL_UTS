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
              <h1>Daftar Game</h1>
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
              <div class="card card-danger card-outline">
                <div class="card-body">

                  <a href="{{url('game/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Game</th>
                        <th>Nama Game</th>
                        <th>Creator</th>
                        <th>Harga Game</th>
                        <th>Tahun Rilis</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($gm->count() > 0)
                        @foreach($gm as $i => $g)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$g->kode_game}}</td>
                            <td>{{$g->nama_game}}</td>
                            <td>{{$g->creator_game}}</td>
                            <td>{{$g->harga_game}}</td>
                            <td>{{$g->tahun_rilis}}</td>
                            <td style="display: flex">
                              <a href="{{ url('/game/'. $g->id.'/edit')}}" class="btn btn-sm btn-warning mr-2">Edit</a>

                              <form method="POST" action="{{ url('/game/'.$g->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
                      @endif
                    </tbody>
                  </table>
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