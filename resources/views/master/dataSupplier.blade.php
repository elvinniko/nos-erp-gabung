@extends('index')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_header">
            <h1>Data Supplier</h1>
            <a href="/datasupplier/create" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              Tambah Supplier
            </a>
          </div>
          <div class="x_body">
            <table class="table table-light">
              <thead class="thead-light">
                <tr>
                  <th>Kode Supplier</th>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Kontak</th>
                  <th>Handphone</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($supplier as $sup)
                  <tr>
                    <td>{{$sup->KodeSupplier}}</td>
                    <td>{{$sup->NamaSupplier}}</td>
                    <td>{{$sup->Alamat}}</td>
                    <td>{{$sup->Kontak}}</td>
                    <td>{{$sup->Handphone}}</td>
                    <td>
                      <a href="/datasupplier/edit/{{ $sup->KodeSupplier }}" class="btn btn-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                      </a>
                      <a href="/datasupplier/destroy/{{ $sup->KodeSupplier }}" class="btn btn-danger">
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
