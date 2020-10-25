<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script>
    $(document).ready(function() {
        var t = $('#tblkelas').DataTable({
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 1]
            }],
            "order": [
                [2, 'asc']
            ],
            "pageLength": 25,
            "language": {
                "sProcessing": "Sedang proses...",
                "sLengthMenu": "Tampilan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Tampilan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Awal",
                    "sPrevious": "Balik",
                    "sNext": "Lanjut",
                    "sLast": "Akhir"
                }
            }
        });

        t.on('order.dt search.dt', function() {
            t.column(1, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#hapusterpilih').click(function() {
            var id = []
            $(':checkbox:checked').each(function(i) {
                id[i] = $(this).val();
            });
            console.log(id.length);
            if (id.length === 0 || id.length === 1) {
                alert("Pilih minimal satu data !");
            } else {
                $.ajax({
                    url: '<?php echo base_url('Kelas/deletechecked'); ?>',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        for (var i = 0; i < id.length; i++) {
                            t.row('.selected').remove().draw(false);
                            Swal.mixin().fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            })
                        }
                    },
                    error: function() {
                        Swal.mixin().fire({
                            icon: 'error',
                            title: 'Data gagal dihapus !',
                            text: 'Kemungkinan besar, masih ada data yang saling berelasi'
                        })
                    }
                });
            }
        })
    });

    $(document).ready(function() {
        $('#val_kelas').validate({
            rules: {
                idkelas: {
                    required: true,
                    maxlength: 30,
                    remote: {
                        url: "<?php echo base_url('Kelas/check'); ?>",
                        type: "post",
                        data: {
                            id: function() {
                                return $("#idkelas").val();
                            }
                        }
                    }
                },
                kelas: {
                    required: true,
                    maxlength: 10
                },
                k_keahlian: {
                    required: true
                }
            },
            messages: {
                idkelas: {
                    required: "Mohon untuk memasukkan ID Kelas",
                    maxlength: "ID Kelas tidak boleh melebihi 30 karakter",
                    remote: "ID Kelas sudah pernah digunakan !"
                },
                kelas: {
                    required: "Mohon untuk memasukkan Nama Kelas",
                    maxlength: "Nama Kelas tidak boleh melebihi 10 karakter"
                },
                k_keahlian: {
                    required: "Mohon pilih salah satu Kompetensi Keahlian"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-valid');
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }
        });
    });

    //Tombol
    $(function() {
        $('.kelas-back').click(function() {
            window.location.href = "<?php echo site_url('kelas'); ?>";
        })
        $('#cetak_keahlian').click(function() {
            window.location.href = "<?php echo site_url('kompetensi_keahlian/cetak_keahlian'); ?>";
        })
        $('#cetak_keahlian_excel').click(function() {
            window.location.href = "<?php echo site_url('kompetensi_keahlian/cetak_keahlian_excel'); ?>";
        })
    })

    //Select Bootstrap
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Kompetensi Keahlian",
        allowClear: true
    })
    $('select').on('select2:close', function (e){
        $(this).valid();
    });
</script>

</body>

</html>