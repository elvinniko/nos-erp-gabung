@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Pemesanan Pembelian</h1>
                        <h3>{{$newID}}</h3>
                    </div>
                    <div class="x_content">
                        <form action="/popembelian/store" method="get">
                        @csrf

                        <!-- Contents -->
                        <br>
                        <div class="form-row">
                            <!-- column 1 -->
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                <input type="hidden" class="form-control" name="KodePO" value="{{$newID}}">
                                </div>
                                <div class="form-group">
                                <label for="inputDate">Tanggal</label>
                                <input type="date" class="form-control" name="Tanggal" id="inputDate">
                                </div>
                                <div class="form-group">
                                <label for="inputBerlaku">Masa Berlaku</label>
                                <input type="text" class="form-control" name="Expired" id="inputBerlaku" placeholder="/hari">
                                </div>
                                <div class="form-group">
                                <label for="inputPPN">PPN</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="PPN" id="ppn1" value="non">
                                    <label class="form-check-label" for="ppn1">Non PPN</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="PPN" id="ppn2" value="include">
                                    <label class="form-check-label" for="ppn2">Include PPN</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="PPN" id="ppn3" value="exclude">
                                    <label class="form-check-label" for="ppn3">Exclude PPN</label>
                                </div>
                                </div>
                            </div>
                            <!-- pembatas -->
                            <div class="form-group col-md-1"></div>
                            <!-- column 2 -->
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                <label for="inputMatauang">Mata Uang</label>
                                <select class="form-control" name="KodeMataUang" id="inputMatauang" placeholder="Pilih mata uang">
                                    @foreach($matauang as $mu)
                                    <option value="{{$mu->KodeMataUang}}">{{$mu->NamaMataUang}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="inputGudang">Gudang</label>
                                <select class="form-control" name="KodeLokasi" id="inputGudang">
                                    @foreach($lokasi as $lok)
                                    <option value="{{$lok->KodeLokasi}}">{{$lok->NamaLokasi}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="inputSupplier">Supplier</label>
                                <select class="form-control" name="KodeSupplier" id="inputSupplier">
                                    @foreach($supplier as $sup)
                                    <option value="{{$sup->KodeSupplier}}">{{$sup->NamaSupplier}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <!-- pembatas -->
                            <div class="form-group col-md-1"></div>
                            <!-- column 3 -->
                            <div class="form-group col-md-3">
                                <label for="inputKeterangan">Keterangan</label>
                                <textarea class="form-control" name="Keterangan" id="inputKeterangan" rows="5"></textarea>
                                <br><br>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection