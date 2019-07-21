@extends('index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h1>Tambah data</h1>
                </div>
                <div class="x_content">
                    <form action="{{ url('/dataitem/store')}}" class="form-horizontal form-label-left input_mask" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="KodeItem">Kode Item</label>
                            <input id="KodeItem" readonly value="{{ $newID }}" class="form-control" type="text" name="KodeItem" placeholder="Kode Item">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kategori</label>
                            <select class="form-control" name="KodeKategori" id="KodeKategori">
                                <option value=""> --Pilih Kode Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->KodeKategori}}">{{ $k->KodeKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="NamaItem">Nama Item</label>
                            <input id="NamaItem" class="form-control" type="text" name="NamaItem" placeholder="Nama Item">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Item</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Jenis_item" id="bb" value="BahanBaku">
                                <label class="form-check-label" for="bb">Bahan Baku</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Jenis_item" id="bahanjadi" value="BahanJadi">
                                <label class="form-check-label" for="bahanjadi">Bahan Jadi</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <select name="KodeSatuan" id="" class="form-control">
                                <option value="">-- Pilih Satuan --</option>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->KodeSatuan}}">{{ $s->NamaSatuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Konversi</label>
                            <input type="number" name="Konversi" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Jual</label>
                            <input type="number" name="HargaJual" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Beli</label>
                            <input type="number" name="HargaBeli" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Grosir</label>
                            <input type="number" name="HargaGrosir" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Alias">Alias</label>
                            <input id="Alias" class="form-control" type="text" name="Alias">
                        </div>
                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <textarea id="Keterangan" class="form-control" name="Keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
