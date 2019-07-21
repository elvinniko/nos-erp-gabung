@extends('index')
@section('content')
    <form action="/dataitem/satuan/store" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="KodeItem">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="">Satuan</label>
                <select name="" id="" class="form-control">
                    <option value="">-- Pilih Satuan --</option>
                    @foreach ($satuan as $s)
                        <option value="{{ $s->KodeSatuan}}">{{ $s->NamaSatuan}}</option>
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
                <input type="number" name="HargaJual" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Harga Grosir</label>
                <input type="number" name="HargaJual" id="" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection
