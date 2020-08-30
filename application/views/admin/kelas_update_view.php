<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
  <button class="btn btn-info btn-lg kelas-back mb-2"><i class="fas fa-undo-alt"></i> Kembali</button>
  <div class="row">
    <div class="col-md-10 col-sm-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Update Data Kelas</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="val_kelas" action="kelas/con_edit" method="POST">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" name="key" value="<?php echo $model->id_kelas ?>">
              <label for="idkelas-key">ID Kelas</label>
              <input type="text" class="form-control" id="idkelas-key" name="idkelas-key" placeholder="Masukkan ID Kelas" value="<?php echo $model->id_kelas ?>" readonly>
            </div>
            <div class="form-group">
              <label for="kelas">Nama Kelas</label>
              <input type="text" class="form-control" name="kelas" placeholder="Masukkan Nama Kelas" value="<?php echo $model->nama_kelas ?>">
            </div>
            <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="k_keahlian">
                    <option value=""></option>
                    <?php foreach($loadkeahlian as $lk) { ?>
                    <?php
                    if($lk['id_kompetensi_keahlian'] == $model->id_kompetensi_keahlian){
                      $select = "selected";
                    }else{
                      $select = "";
                    }  
                    ?>
                    <option value="<?php echo $lk['id_kompetensi_keahlian']; ?>" <?php echo $select ?>><?php echo $lk['nama_kompetensi_keahlian']." - (".$lk['id_kompetensi_keahlian'].")" ?></option>
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
        Update data Kelas pada Form Update.
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->