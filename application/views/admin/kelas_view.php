<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-10 col-sm-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Input Data Kelas</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="idkelas">ID Kelas</label>
              <input type="text" class="form-control" id="idkelas" placeholder="Masukkan ID Kelas">
            </div>
            <div class="form-group">
              <label for="kelas">Nama Kelas</label>
              <input type="text" class="form-control" id="kelas" placeholder="Masukkan Nama Kelas">
            </div>
            <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option value=""></option>
                    <?php foreach($loadkeahlian as $lk) { ?>
                    <option><?php echo $lk['nama_kompetensi_keahlian']." - (".$lk['id_kompetensi_keahlian'].")" ?></option>
                    <?php } ?>
                  </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-2 col-sm-12">
      <div class="alert alert-info">
        <h5><i class="icon fas fa-info"></i> Info</h5>
        Isikan semua yang berkaitan dengan Data Kelas pada form input.
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Kelas</h3>
        </div>
        <div class="card-body">
          <table id="tblkelas" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telp.</th>
                <th>SPP</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($query->result_array() as $kolom) { ?>
                <tr>
                  <td></td>
                  <td><?php echo $kolom['nisn']; ?></td>
                  <td><?php echo $kolom['nis']; ?></td>
                  <td><?php echo $kolom['nama']; ?></td>
                  <td><?php echo $kolom['id_kelas']; ?></td>
                  <td><?php echo $kolom['alamat']; ?></td>
                  <td><?php echo $kolom['no_telp']; ?></td>
                  <td><?php echo $kolom['id_spp']; ?></td>
                  <td><?php echo $kolom['photo']; ?></td>
                  <td style="width: 80px; text-align: center;">
                    <a style="width: 100%" class="btn btn-info btn-sm" href="#"><i class="fas fa-edit"></i> Ubah</a>
                    <a style="width: 100%" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telp.</th>
                <th>SPP</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->