@extends('home')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Data Item</h1>
            <a href="{{ url('/dataitem/create')}}" class="btn btn-success">
              <i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Item
            </a>
          </div>
          <div class="card-body">
            <table class="table table-light">
              <thead class="thead-light">
                <tr>
                  <th>Kode Item</th>
                  <th>Kode Kategori</th>
                  <th>Nama Item</th>
                  <th>Jenis Item</th>
                  {{-- <th>Satuan</th> --}}
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($items as $item)
                  <tr>
                      <td>{{ $item->KodeItem }}</td>
                      <td>{{ $item->KodeKategori }}</td>
                      <td>{{ $item->NamaItem }}</td>
                      <td>{{ $item->Jenis_item}}</td>
                      {{-- <td>{{ $item->KodeSatuan }}</td> --}}
                      <td>{{ $item->Status}}</td>
                      <td>
                        <a href="#" class="btn btn-warning">
                          <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>Hapus
                        </button>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
              {{ $items->links()}}
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
