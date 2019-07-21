@extends('home')
@section('content')
<div class="container">
  <div class="row">
    <div class="container">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">S.O. Dikirim</h1>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <div class="card">
        <div class="card-header">
          <form >
            <!-- <button class="btn btn-success">
                      <i class="fas fa-plus">&nbsp;&nbsp;Tambah Data P.O</i>
            </button>-->
  
            <!-- Contents -->
            <br>
            <div class="form-row">
              <!-- column 1 -->
              <div class="">
                <input
                  class="form-control form-control-navbar"
                  type="search"
                  placeholder="Cari Nomor S.O"
                  aria-label="Search"
                >
              </div>
            </div>
            <hr class="style1">
            <div class="form-row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Nomor S.O</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Gudang</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Besi</td>
                    <td>10</td>
                    <td>Ro.1000</td>
                    <td>Rp.5.000</td>
                    <td>Keterangan</td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-success"
                        data-toggle="modal"
                        data-target="#exampleModal"
                      >Lihat</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
      <!-- Button trigger modal -->
  
      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Daftar Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Besi</td>
                    <td>10</td>
                    <td>10</td>
                    <td>10</td>
                    <td>Ro.1000</td>
                    <td>Rp.5.000</td>
                    <td>Keterangan</td>
                    
                  </tr>
                </tbody>
              </table>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group col-md-4">
      <label class="control-label col-md-3">Nomer P.O</label>
      <div class="col-md-10">
        <select class="form-control">
          <option>PO-150700005 </option>
          <option></option>
        </select>
        <input type="text" class="form-control col-md-10" placeholder="">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label class="control-label col-md-5">Tanggal</label>
      <div class="col-md-10">
        <input type="text" class="form-control" placeholder="">
      </div>
    </div>

    <div class="form-group col-md-4">
      <label class="control-label col-md-5">Keterangan</label>
      <div class="col-md-10">
        <textarea id="keterangan" class="form-control rounded-0"></textarea>
      </div>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga Satuan</th>
          <th scope="col">Diskon</th>
          <th scope="col">Total</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Besi</td>
          <td>10</td>
          <td>Ro.1000</td>
          <td>Ro.5.000</td>
          <td>Rp.5.000</td>
          <td></td>
          <td>CLS</td>

        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Baja</td>
          <td>20</td>
          <td>Ro.2000</td>
          <td>Rp.0</td>
          <td>Rp.40.000</td>
          <td></td>
          <td>CLS</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Kayu</td>
          <td>30</td>
          <td>Ro.3000</td>
          <td>Rp.0</td>
          <td>Rp.9000</td>
          <td></td>
          <td>CLS</td>
        </tr>
      </tbody>
    </table>
    <div class="text-right col-md-10">
      <h1>Total : Rp.54.000 </h1>
    </div>

  </div>
</div>
@endsection