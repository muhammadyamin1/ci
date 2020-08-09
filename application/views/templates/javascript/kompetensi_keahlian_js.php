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
            "pageLength": 25
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
            if (id.length === 0) {
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
                    required: true
                },
            },
            messages: {
                idkeahlian: {
                    required: "Mohon untuk memasukkan ID Keahlian",
                    maxlength: "ID Kompetensi Keahlian tidak boleh melebihi 15 karakter",
                    remote: "ID Kompetensi Keahlian sudah ada !"
                },
                keahlian: {
                    required: "Mohon untuk memasukkan Nama Kompetensi Keahlian"
                },
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