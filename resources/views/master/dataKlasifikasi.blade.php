@extends('home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Data Klasifikasi</h1>
            <a href="/dataklasifikasi/create" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              Tambah Klasifikasi
            </a>
          </div>
          <div class="card-body">
            <table class="table table-light">
              <thead class="thead-light">
                <tr>
                  <th>Kode Klasifikasi</th>
                  <th>Nama Klasifikasi</th>
                  <th>Kode Item</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($kategori as $kat)
                  <tr>
                    <td>{{$kat->KodeKategori}}</td>
                    <td>{{$kat->NamaKategori}}</td>
                    <td>{{$kat->KodeItemAwal}}</td>
                    <td>
                      <a href="/dataklasifikasi/edit/{{ $kat->KodeKategori }}" class="btn btn-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                      </a>
                      <a href="/dataklasifikasi/destroy/{{ $kat->KodeKategori }}" class="btn btn-danger">
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