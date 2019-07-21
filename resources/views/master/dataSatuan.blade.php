@extends('home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Data Satuan</h1>
            <a href="/datasatuan/create" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              Tambah Satuan
            </a>
          </div>
          <div class="card-body">
            <table class="table table-light">
              <thead class="thead-light">
                <tr>
                  <th>Kode Satuan</th>
                  <th>Nama Satuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($satuan as $sat)
                  <tr>
                    <td>{{$sat->KodeSatuan}}</td>
                    <td>{{$sat->NamaSatuan}}</td>
                    <td>
                      <a href="/datasatuan/edit/{{ $sat->KodeSatuan }}" class="btn btn-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                      </a>
                      <a href="/datasatuan/destroy/{{ $sat->KodeSatuan }}" class="btn btn-danger">
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