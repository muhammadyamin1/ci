<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="content">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Informasi Siswa</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Siswa</button>
                    <button class="btn bg-navy color-palette mb-2" id="info"><i class="fas fa-info-circle"></i> Detail Siswa</button>
                    <table id="tblsiswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="min-width: 30px;">No</th>
                                <th style="min-width: 100px;">NISN</th>
                                <th style="min-width: 80px;">NIS</th>
                                <th style="min-width: 300px;">Nama</th>
                                <th style="min-width: 100px;">Kelas</th>
                                <th style="min-width: 400px;">Alamat</th>
                                <th style="min-width: 120px;">No. Hp</th>
                                <th style="min-width: 80px;">Foto</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $kolom) {
                                $id = $kolom['nisn'];
                            ?>
                                <tr>
                                    <td style="min-width: 30px;"></td>
                                    <td id="nisn" style="min-width: 100px;"><?php echo $id ?></td>
                                    <td id="nis" style="min-width: 80px;"><?php echo $kolom['nis']; ?></td>
                                    <td id="nama" style="min-width: 300px;"><?php echo $kolom['nama']; ?></td>
                                    <td id="nama_kelas" style="min-width: 100px;"><?php echo $kolom['nama_kelas']; ?></td>
                                    <td id="alamat" style="min-width: 400px;"><?php echo $kolom['alamat']; ?></td>
                                    <td id="no_telp" style="min-width: 120px;"><?php echo $kolom['no_telp']; ?></td>
                                    <td id="foto" style="min-width: 80px;"><?php echo $kolom['photo']; ?></td>
                                    <td style="min-width: 80px; text-align: center; vertical-align: middle;">
                                        <a href="kompetensi_keahlian/con_edit/<?php echo $id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                                        <a href="kompetensi_keahlian/con_hapus/<?php echo $id ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-info-circle"></i> Detail Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 mb-4 text-center">
                                                <img class="img-fluid img-circle" src="<?php echo base_url(); ?>assets/dist/img/user1-128x128.jpg" alt="User profile picture"><br>
                                                <strong><div id="nama2">Tidak Diketahui - Database Load Error</div></strong>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <table>
                                                    <tr>
                                                        <td width="40px"><i class="fas fa-id-card" data-toggle="tooltip" title="NISN"></td>
                                                        <td width="20px">:</td>
                                                        <td>
                                                            <div id="nisn2"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40px"><i class="fas fa-user-graduate" data-toggle="tooltip" title="NIS"></td>
                                                        <td width="20px">:</td>
                                                        <td>
                                                            <div id="nis2"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40px"><i class="fas fa-home" data-toggle="tooltip" title="Alamat"></td>
                                                        <td width="20px">:</td>
                                                        <td>
                                                            <div id="alamat2"></i></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <table>
                                                    <tr>
                                                        <td width="40px"><i class="fas fa-chalkboard-teacher" data-toggle="tooltip" title="Kelas"></td>
                                                        <td width="20px">:</td>
                                                        <td>
                                                            <div id="kelas2"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40px"><i class="fas fa-phone-alt" data-toggle="tooltip" title="No. Handphone"></td>
                                                        <td width="20px">:</td>
                                                        <td>
                                                            <div id="telp2"></i></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Identitas Siswa</button>
                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus Siswa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>