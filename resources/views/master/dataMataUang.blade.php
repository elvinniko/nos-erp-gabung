@extends('home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Data Mata Uang</h1>
            <a href="/datamatauang/create" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              Tambah Mata Uang
            </a>
          </div>
          <div class="card-body">
            <table class="table table-light">
              <thead class="thead-light">
                <tr>
                  <th>Kode Mata Uang</th>
                  <th>Nama Mata Uang</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($matauang as $mu)
                  <tr>
                    <td>{{$mu->KodeMataUang}}</td>
                    <td>{{$mu->NamaMataUang}}</td>
                    <td>{{$mu->Nilai}}</td>
                    <td>
                      <a href="/datamatauang/edit/{{ $mu->KodeMataUang }}" class="btn btn-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                      </a>
                      <a href="/datamatauang/destroy/{{ $mu->KodeMataUang }}" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>Hapus
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
  </div>
@endsection