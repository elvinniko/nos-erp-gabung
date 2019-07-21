@extends('index')
@section('content')
{{-- <style>
    .btn {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
      background-color: RoyalBlue;
    }
    </style> --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h1>Surat Jalan</h1>
                    {{-- <h3>{{$newID}}</h3> --}}
                </div>
                <div class="x_content">
                    <form action="/sopenjualan/store" method="get">
                        @csrf

                        <!-- Contents -->
                        <br>
                        <div class="form-row">
                            <!-- column 1 -->
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label for="">No S.O</label>
                                    <input type="text" class="form-control" name="KodeSO" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputDate">Tanggal</label>
                                    <input type="date" class="form-control" name="Tanggal" id="inputDate">
                                </div>
                                <div class="form-group">
                                    <label for="inputBerlaku">Alamat</label>
                                    <input type="text" class="form-control" name="Expired" id="inputBerlaku" placeholder="/hari">
                                </div>
                                <div class="form-group">
                                    <label for="inputTerm">Sopir</label>
                                    <input type="text" class="form-control" name="Term" id="inputTerm" placeholder="/hari">
                                </div>
                            </div>
                            <!-- pembatas -->
                            <div class="form-group col-md-1"></div>
                            <!-- column 2 -->
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="inputPO">No Polisi</label>
                                    <select class="form-control" name="KodePO" id="inputPO" placeholder="Pilih kode PO">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputGudang">Gudang</label>
                                    <select class="form-control" name="KodeLokasi" id="inputGudang">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPelanggan">Pelanggan</label>
                                    <select class="form-control" name="KodePelanggan" id="inputPelanggan">

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

                        <br>
                        d
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
