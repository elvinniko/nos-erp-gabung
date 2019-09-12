@extends('index')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>Pemesanan Penjualan</h1>
              <h2>Filter</h2><br>
                        <div class="row">
                            <form action="{{ url('/konfirmasipemesananPenjualan/filter') }}" method="post">
                                @csrf
                                <div class="col-md-3">
                                    <label>Start date</label>
                                    <input type="date" class="form-control" name="start" required="">
                                    <label>End date</label>
                                    <input type="date" class="form-control" name="finish" required="">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </form>
                            <form action="{{ url('/konfirmasipemesananPenjualan/print') }}" method="post">
                                @csrf
                                <div class="row pull-right">
                                    @if($filter)
                                        <input type="hidden" value="{{$start}}" name="start">
                                        <input type="hidden" value="{{$finish}}" name="finish">
                                    @endif
                                    <input type="submit" name="" value="Print" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
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
                    <th>Action</th>
                  </tr>
                </thead>
                  @foreach ($pemesananpenjualan as $p)
                    <tr>
                        <td>{{ $p->KodeSO}}</td>
                        <td>{{ $p->Tanggal}}</td>
                        <td>{{ $p->tgl_kirim}}</td>
                        <td>{{ $p->Expired }}</td>
                        <td>{{ $p->KodeMataUang}}</td>
                        <td>{{ $p->KodeLokasi}}</td>
                        <td>{{ $p->KodePelanggan}}</td>
                        <td>{{ $p->term }}</td>
                        <th><a href="{{ url('sopenjualan/view/'.$p->KodeSO) }}"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a></th>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
