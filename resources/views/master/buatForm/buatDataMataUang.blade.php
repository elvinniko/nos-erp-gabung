@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Tambah Data Mata Uang</h1>
                    </div>
                    <div class="x_content">
                        <form action="/datamatauang/store" method="get">
                        @csrf
                            <div class="form-group">
                                <label>Kode Mata Uang: </label>
                                <input type="text" required="required" name="KodeMataUang" placeholder="Kode Mata Uang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Mata Uang: </label>
                                <input type="text" required="required" name="NamaMataUang" placeholder="Nama Mata Uang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nilai: </label>
                                <input type="text" required="required" name="Nilai" placeholder="Nilai" class="form-control">
                            </div>
                            <button class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection