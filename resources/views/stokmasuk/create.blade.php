@extends('index')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Stok Masuk</h1>
                        <form action="/stokmasuk/store" method="get">
                            @csrf
                        <h3>{{$newID}}</h3>
                    </div>
                    <div class="x_content">

                            <!-- Contents -->
                            <br>
                            <div class="form-row">
                               <div class="form-group">
                                    <input type="hidden" class="form-control" name="KodeStokMasuk" value="{{$newID}}">
                                   <label for="">Nama Gudang</label>
                                    <select name="KodeLokasi" id="" class="form-control">
                                        <option value="">-- Pilih Gudang --</option>
                                        @foreach ($lokasi as $l)
                                            <option value="{{ $l->KodeLokasi}}">{{ $l->NamaLokasi}}</option>
                                        @endforeach
                                    </select>
                               </div>
                               <div class="form-group">
                                   <label for="">Tanggal</label>
                                   <input type="date" name="Tanggal" id="" class="form-control">
                               </div>
                               <div class="form-gorup">
                                   <label for="">Status</label>
                                   <input type="text" name="Status" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label for="">Total Item</label>
                                   <input type="number" name="TotalItem" class="form-control">
                               </div>
                               <input class="btn btn-success" type="submit" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
