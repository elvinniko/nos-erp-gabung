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
                        <form action="{{ route('datapelanggan.update',$pelanggan->KodePelanggan)}}" class="form-horizontal form-label-left input_mask" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="NamaPelanggan">Nama Pelanggan</label>
                                <input id="NamaPelanggan" class="form-control" type="text" name="NamaPelanggan" value="{{ $pelanggan->NamaPelanggan}}" />
                            </div>
                            <div class="form-group">
                                <label for="Kontak">Kontak</label>
                                <input id="Kontak" class="form-control" type="number" name="Kontak" value="{{ $pelanggan->Kontak}}" />
                            </div>
                            <div class="form-group">
                                <label for="Handphone">Handphone</label>
                                <input id="Handphone" class="form-control" type="number" name="Handphone" value="{{ $pelanggan->Handphone}}" />
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input id="Email" class="form-control" type="email" name="Email" value="{{ $pelanggan->Email}}" />
                            </div>
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input id="NIK" class="form-control" type="number" name="NIK" value="{{ $pelanggan->NIK}}" />
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