@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Kartu Stok</h1><br>
                    </div>
                    <div class="x_body">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Kode User</th>
                                    <th>Kode Lokasi</th>
                                    <th>Term</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice as $stokmasuk)
                                    <tr>
                                        <td>{{ $stokmasuk->Tanggal}}</td>
                                        <td>{{ $stokmasuk->KodePelanggan}}</td>
                                        <td>{{ $stokmasuk->Status}}</td>
                                        <td>{{ $stokmasuk->Keterangan}}</td>
                                        <td>{{ $stokmasuk->KodeUser}}</td>
                                        <td>{{ $stokmasuk->KodeLokasi}}</td>
                                        <td>{{ $stokmasuk->Term}}</td>
                                        <td>{{ $stokmasuk->Total}}</td>
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
