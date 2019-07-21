@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Lihat Data Gudang</h1>
                    </div>
                    <div class="x_content">
                        @foreach($lokasi as $lok)
                        <form action="/datagudang">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Gudang</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->KodeLokasi }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Gudang</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->NamaLokasi }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tipe</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->Tipe }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->Status }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Dibuat pada</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->created_at }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Diubah pada</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->updated_at }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Terakhir diubah</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $lok->KodeUser }}">
                                </div>
                            </div>
                            <button class="btn btn-success">Kembali</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection