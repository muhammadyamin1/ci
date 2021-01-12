<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script>
    $(document).ready(function() {
        var t = $('#tblkeahlian').DataTable({
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
                    url: '<?php echo base_url('Kompetensi_keahlian/deletechecked'); ?>',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        for (var i = 0; i < id.length; i++) {
                            t.row('.selected').remove().draw( false );
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
        $('#val_keahlian').validate({
            rules: {
                idkeahlian: {
                    required: true,
                    maxlength: 15,
                    remote: {
                        url: "<?php echo base_url('Kompetensi_keahlian/check'); ?>",
                        type: "post",
                        data: {
                            id: function() {
                                return $("#idkeahlian").val();
                            }
                        }
                    }
                },
                keahlian: {
                    required: true,
                    maxlength: 50
                },
            },
            messages: {
                idkeahlian: {
                    required: "Mohon untuk memasukkan ID Keahlian",
                    maxlength: "ID Kompetensi Keahlian tidak boleh melebihi 15 karakter",
                    remote: "ID Kompetensi Keahlian sudah ada !"
                },
                keahlian: {
                    required: "Mohon untuk memasukkan Nama Kompetensi Keahlian",
                    maxlength: "Nama Kompetensi Keahlian tidak boleh melebihi 50 karakter"
                },
            },
            errorElement: 'span',
            submitHandler: function(){
                $('#btnSubmit').prop('disabled','disabled');
                $('#btnSubmit').html("Loading <i class='fas fa-sync fa-spin'></i>");
                $('#val_keahlian')[0].submit();
            },
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
        $('.keahlian-back').click(function() {
            window.location.href = "<?php echo site_url('kompetensi_keahlian'); ?>";
        })
        $('#cetak_keahlian').click(function() {
            window.location.href = "<?php echo site_url('kompetensi_keahlian/cetak_keahlian'); ?>";
        })
        $('#cetak_keahlian_excel').click(function() {
            window.location.href = "<?php echo site_url('kompetensi_keahlian/cetak_keahlian_excel'); ?>";
        })
    })
</script>

</body>

</html>