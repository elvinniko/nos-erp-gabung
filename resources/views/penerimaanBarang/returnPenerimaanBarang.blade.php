@extends('home')
@section('content')
<style>
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
</style>
<!-- page content -->
<br><br><br>
<div class="container">
  <div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Return Penerimaan Barang</h1>
      </div><!-- /.col -->
      </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>

  <div class="card">
      <div class="card-header">
        <h2>RPB-150700005</h2>
          <form >
          <!-- <button class="btn btn-success">
              <i class="fas fa-plus">&nbsp;&nbsp;Tambah Data P.O</i>
          </button> -->

          <!-- Contents -->
          <br>
          <div class="form-row">
              <!-- column 1 -->
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label for="inputSO">Nomor P.O.</label>
                  <select class="form-control" id="inputPO">
                    <option>PO-150700005</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDate">Tanggal</label>
                  <input type="date" class="form-control" id="inputDate" value="2015-07-11">
                </div>
              </div>
              <!-- pembatas -->
              <div class="form-group col-md-1"></div>
              <!-- column 2 -->
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="inputGudang">Gudang</label>
                  <select class="form-control" id="inputGudang" disabled>
                    <option>Toko Widodo</option>
                    <option>Toko Dennis</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputSupplier">Supplier</label>
                  <select class="form-control" id="inputSupplier" disabled>
                    <option>Toko Damai</option>
                    <option>Toko Suka</option>
                  </select>
                </div>
              </div>
              <!-- pembatas -->
              <div class="form-group col-md-1"></div>
              <!-- column 3 -->
              <div class="form-group col-md-3">
                <label for="inputKeterangan">Keterangan</label>
                <textarea class="form-control" id="inputKeterangan" rows="5"></textarea>
              </div>
          </div>
          <hr class="style1">
          <div class="form-row">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th>1</th>
                      <td>Besi</td>
                      <td>10</td>
                      <td></td>

                  </tr>
                  <tr>
                      <th>2</th>
                      <td>Baja</td>
                      <td>20</td>
                      <td> </td>

                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Kayu</td>
                      <td>30</td>
                      <td> </td>

                  </tr>
              </tbody>
          </table>
          </div>
          <div class="form-row">
            <div class="form-group col-md-1"></div>
            <div class="form-group col-md-3">
              <br>
              <button type="button" class="btn btn-success">&nbsp;&nbsp;Simpan&nbsp;&nbsp;</button>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-3">
              <div class="form-group">
                <br>
              <button type="button" class="btn btn-success">&nbsp;&nbsp;Cetak&nbsp;&nbsp;</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<!-- /page content -->
@endsection