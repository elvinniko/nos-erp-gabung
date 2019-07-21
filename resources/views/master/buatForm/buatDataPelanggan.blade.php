@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Tambah data</h1>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('datapelanggan.store')}}" class="form-horizontal form-label-left input_mask" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="KodePelanggan">Kode Pelanggan</label>
                                <input id="KodePelanggan" readonly value="{{ $newID}}" class="form-control" type="text" name="KodePelanggan">
                            </div>
                            <div class="form-group">
                                <label for="NamaPelanggan">Nama Pelanggan</label>
                                <input id="NamaPelanggan" class="form-control" type="text" name="NamaPelanggan">
                            </div>
                            <div class="form-group">
                                <label for="Kontak">Kontak</label>
                                <input id="Kontak" class="form-control" type="number" name="Kontak">
                            </div>
                            <div class="form-group">
                                <label for="Handphone">Handphone</label>
                                <input id="Handphone" class="form-control" type="number" name="Handphone">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input id="Email" class="form-control" type="email" name="Email">
                            </div>
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input id="NIK" class="form-control" type="number" name="NIK">
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-database" aria-hidden="true"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
