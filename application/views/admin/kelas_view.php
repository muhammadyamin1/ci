<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
  <div class="row">
    <div class="col-md-10 col-sm-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Input Data Kelas</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="val_kelas" action="kelas/con_tambah" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="idkelas">ID Kelas</label>
              <input type="text" class="form-control" id="idkelas" name="idkelas" placeholder="Masukkan ID Kelas">
            </div>
            <div class="form-group">
              <label for="kelas">Nama Kelas</label>
              <input type="text" class="form-control" name="kelas" placeholder="Masukkan Nama Kelas">
            </div>
            <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="k_keahlian">
                    <option value=""></option>
                    <?php foreach($loadkeahlian as $lk) { ?>
                    <option value="<?php echo $lk['id_kompetensi_keahlian']; ?>"><?php echo $lk['nama_kompetensi_keahlian']." - (".$lk['id_kompetensi_keahlian'].")" ?></option>
                    <?php } ?>
                  </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
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
          <button class="btn btn-danger mb-2" id="hapusterpilih"><i class="fas fa-trash"></i> Hapus Data Terpilih</button>
          <button class="btn btn-secondary mb-2" id="cetak_keahlian"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
          <button class="btn btn-success mb-2" id="cetak_keahlian_excel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
          <table id="tblkelas" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th style="text-align: center; vertical-align: middle;"><input type="checkbox" name="checkall" id="checkall"></th>
                <th>No</th>
                <th width="120px">ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($query as $kolom) { 
                $id = $kolom['id_kelas'];
              ?>
                <tr id="<?php echo $id ?>" class="checkrow">
                  <td style="text-align: center; vertical-align: middle;"><input class="check" type="checkbox" name="id[]" value="<?php echo $id ?>"></td>
                  <td></td>
                  <td><?php echo $kolom['id_kelas']; ?></td>
                  <td><?php echo $kolom['nama_kelas']; ?></td>
                  <td><?php echo $kolom['nama_kompetensi_keahlian']; ?></td>
                  <td style="width: 100px; text-align: center;">
                    <a href="kelas/con_edit/<?php echo $id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                    <a href="kelas/con_hapus/<?php echo $id ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>No</th>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
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