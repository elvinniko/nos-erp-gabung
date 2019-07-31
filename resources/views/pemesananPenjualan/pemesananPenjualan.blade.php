@extends('index')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>Pemesanan Penjualan</h1>
              <h3>Sales Order</h3>
              <br>
              <a href="/sopenjualan/create" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>Tambah S.O.
              </a>
            </div>
            <div class="card-body">
              <table class="table table-light">
                <thead class="thead-light">
                  <tr>
                    <th>Kode SO</th>
                    <th>Tanggal</th>
                    <th>Tanggal Kirim</th>
                    <th>Expired</th>
                    <th>Mata Uang</th>
                    <th>Gudang</th>
                    <th>Pelanggan</th>
                    <th>Term</th>
                    <th>Item</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                  @foreach ($pemesananpenjualan as $p)
                    <tr>
                        <td>{{ $p->KodeSO}}</td>
                        <td>{{ $p->Tanggal}}</td>
                        <td>{{ $p->TanggalKirim}}</td>
                        <td>{{ $p->Expired }}</td>
                        <td>{{ $p->KodeMataUang}}</td>
                        <td>{{ $p->KodeLokasi}}</td>
                        <td>{{ $p->KodePelanggan}}</td>
                        <td>{{ $p->Term }}</td>
                        <td>
                            <a href="/sopenjualan/select/{{ $p->KodeSO}}" class="btn-sm btn btn-warning">pilih barang</a>
                        </td>
                        <td>
                          <a href="/sopenjualan/show/{{ $p->KodeSO }}" class="btn-sm btn btn-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td>
                          <a href="/sopenjualan/edit/{{ $p->KodeSO }}" class="btn-sm btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </a>
                          <a href="/sopenjualan/destroy/{{ $p->KodeSO }}" class="btn-sm btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
