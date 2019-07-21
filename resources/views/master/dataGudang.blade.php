@extends('index')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Data Gudang</h1>
            <br>
            <a href="/datagudang/create" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              Tambah Gudang
            </a>
          </div>
          <div class="card-body">
            <table class="table table-light" id="gudang_table">
              <thead class="thead-light">
                <tr>
                  <th>Kode Gudang</th>
                  <th>Nama Gudang</th>
                  <th>Tipe</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($lokasi as $lok)
                  <tr>
                    <td>{{$lok->KodeLokasi}}</td>
                    <td>{{$lok->NamaLokasi}}</td>
                    <td>{{$lok->Tipe}}</td>
                    <td>
                      <a href="/datagudang/show/{{ $lok->KodeLokasi }}" class="btn-xs btn btn-primary">
                        <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Lihat
                      </a>
                      <a href="/datagudang/edit/{{ $lok->KodeLokasi }}" class="btn-xs btn btn-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                      </a>
                      <!-- <button onclick="deleteFunction()" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>Hapus
                      </button> -->
                      <a href="/datagudang/destroy/{{ $lok->KodeLokasi }}" class="btn-xs btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus
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
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#gudang_table').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax":{{ route('datagudang.getdata') }},
                "columns":[
                    { "data": "KodeLokasi"},
                    { "data": "NamaLokasi"},
                    { "data": "Tipe"}
                ]
            });
        });
    </script>
@endsection
