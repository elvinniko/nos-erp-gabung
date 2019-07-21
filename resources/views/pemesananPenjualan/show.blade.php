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
                  </tr>
                </thead>
                  @foreach ($pemesananpenjualan as $p)
                    <tr>
                        <td>{{ $p->KodeSO}}</td>
                        <td>{{ $p->Tanggal}}</td>
                        <td>{{ $p->TanggalKirim}}</td>
                        <td>{{ $p->Expired }}</td>
                        <td>{{ $p->NamaMataUang}}</td>
                        <td>{{ $p->NamaLokasi}}</td>
                        <td>{{ $p->NamaPelanggan}}</td>
                        <td>{{ $p->Term }}</td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
