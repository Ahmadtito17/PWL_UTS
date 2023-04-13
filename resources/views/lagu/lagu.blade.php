@extends('layout.template')

@section('title')
  Lagu
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Daftar Lagu</h1>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col">
  
              <!-- Profile Image -->
              <div class="card card-danger card-outline">
                <div class="card-body">

                  <a href="{{url('lagu/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                  <form action="{{ url('lagu') }}" method="GET" class="form-inline my-2 my-lg-0">
                    
                    <input class="form-control mr-sm-2 my-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Artis</th>
                        <th>Genre</th>
                        <th>Tanggal Rilis</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($lagu->count() > 0)
                        @foreach($lagu as $i => $m)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$m->judul}}</td>
                            <td>{{$m->artis}}</td>
                            <td>{{$m->genre}}</td>
                            <td>{{$m->tanggal_rilis}}</td>
                            <td style="display: flex">
                              <a href="{{ url('/lagu/'. $m->id.'/edit')}}" class="btn btn-sm btn-warning mr-2">Edit</a>

                              <form method="POST" action="{{ url('/lagu/'.$m->id)}}">
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