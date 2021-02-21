<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script>
    $(document).ready(function() {
        var t = $('#tblsiswa').DataTable({
            "scrollX": true,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [3, 'asc']
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
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#tblsiswa').on('click', 'tr', function() {
            $(this).addClass('selected').siblings().removeClass('selected');
        });

        $('#info').click(function() {
            if ($('#tblsiswa tbody tr.selected').length == 0) {
                console.log($('#tblsiswa tbody tr.selected').length);
                Swal.mixin().fire({
                    icon: 'info',
                    title: 'Pilih siswa untuk melihat detail',
                })
            }
            $("#tblsiswa > tbody > tr").each(function() {
                if ($(this).hasClass("selected")) {
                    let namaSiswa = $(this).find("td#nama").text();
                    let nisn = $(this).find("td#nisn").text();
                    let nis = $(this).find("td#nis").text();
                    let nama = $(this).find("td#nama").text();
                    let alamat = $(this).find("td#alamat").text();
                    let kelas = $(this).find("td#nama_kelas").text();
                    let telp = $(this).find("td#no_telp").text();
                    $('#nama2').html(nama);
                    $('#nisn2').html(nisn);
                    $('#nis2').html(nis);
                    $('#alamat2').html(alamat);
                    $('#kelas2').html(kelas);
                    $('#telp2').html(telp);
                    $('#exampleModal').modal('show');
                }
            });
        })
    });
</script>

</body>

</html>