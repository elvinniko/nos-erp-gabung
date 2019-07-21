@extends('index')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>Pemesanan Pembelian</h1>
              <h3>Purchase Order</h3>
              <br>
              <a href="/popembelian/create" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>Tambah P.O
              </a>
            </div>
            <div class="card-body">
              <table class="table table-light">
                <thead class="thead-light">
                  <tr>
                    <th>Kode PO</th>
                    <th>Gudang</th>
                    <th>Mata Uang</th>
                    <th>Supplier</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Expired</th>
                    <th>Item</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pemesananpembelian as $pp)
                      <tr>
                        <td>{{ $pp->KodePO}}</td>
                        <td>{{ $pp->NamaLokasi}}</td>
                        <td>{{ $pp->NamaMataUang}}</td>
                        <td>{{ $pp->NamaSupplier}}</td>
                        <td>{{ $pp->Tanggal}}</td>
                        <td>{{ $pp->Expired }}</td>
                        <td>
                          <a href="/popembelianitem/show/{{ $pp->KodePO }}" class="btn-sm btn btn-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td>
                          <a href="/popembelian/edit/{{ $pp->KodePO }}" class="btn-sm btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </a>
                          <a href="/popembelian/destroy/{{ $pp->KodePO }}" class="btn-sm btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
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