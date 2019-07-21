@extends('home')
@section('content')
<!-- page content -->
<br><br><br>
<div class="container">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">P.O. Konfirmasi</h1>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <div class="card">
    <div class="card-header">
      <form>
        <!-- <button class="btn btn-success">
                  <i class="fas fa-plus">&nbsp;&nbsp;Tambah Data P.O</i>
        </button>-->

        <!-- Contents -->
        <br>
        <div class="form-row">
          <!-- column 1 -->
          <div>
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
                <th scope="col">Nomor P.O</th>
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
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value> Done
                    </label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection