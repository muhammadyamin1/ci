<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
    <button class="btn btn-info btn-lg keahlian-back mb-2"><i class="fas fa-undo-alt"></i> Kembali</button>
    <div class="row">
        <div class="col-md-10 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Update Data Kompetensi Keahlian</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="val_keahlian" action="kompetensi_keahlian/con_edit" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="key" value="<?php echo $model->id_kompetensi_keahlian ?>">
                            <label for="idkeahlian-key">ID Kompetensi Keahlian</label>
                            <input type="text" class="form-control" name="idkeahlian-key" id="idkeahlian-key" placeholder="Masukkan ID Kompetensi Keahlian" value="<?php echo $model->id_kompetensi_keahlian ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="keahlian">Nama Kompetensi Keahlian</label>
                            <input type="text" class="form-control" name="keahlian" placeholder="Masukkan Nama Kompetensi Keahlian" value="<?php echo $model->nama_kompetensi_keahlian ?>">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> Info</h5>
                Update data Kompetensi Keahlian pada Form Update.
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->