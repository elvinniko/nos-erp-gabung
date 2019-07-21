@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Stok Masuk</h1><br>
                        <a href="/stokmasuk/create" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i>Tambah Stok Masuk
                        </a>
                    </div>
                    <div class="x_body">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>KodeStokMasuk</th>
                                    <th>Gudang</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total item</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokmasuks as $stokmasuk)
                                    <tr>
                                        <td>{{ $stokmasuk->KodeStokMasuk}}</td>
                                        <td>{{ $stokmasuk->NamaLokasi}}</td>
                                        <td>{{ $stokmasuk->Tanggal}}</td>
                                        <td>{{ $stokmasuk->Status }}</td>
                                        <td>{{ $stokmasuk->TotalItem}}</td>
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
