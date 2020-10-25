<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- page script -->
<script>
    $(document).ready(function() {
        $('.check').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected')
            } else {
                $(this).closest('tr').removeClass('selected')
            }
        })

        $('#checkall').click(function() {
            $('.check').prop('checked', this.checked);
            if ($(this).is(':checked')) {
                $('.checkrow').addClass('selected');
            } else {
                $('.checkrow').removeClass('selected');
            }
        });
    })

    //Tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    //Alert
    const Toast = Swal.mixin();
    const flashData = $('.flash-data').data('flashdata');
    if (flashData == "tambah") {
        toastr.success('Data berhasil ditambahkan')
    } else if (flashData == "edit") {
        toastr.success('Data berhasil diedit')
    } else if (flashData == "hapus") {
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil dihapus'
        })
    } else if (flashData == "gagalhapus") {
        Toast.fire({
            icon: 'error',
            title: 'Data gagal dihapus !',
            text: 'Kemungkinan besar, masih ada data yang saling berelasi'
        })
    }

    //Alert
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultInfo').click(function() {
            Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultWarning').click(function() {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultQuestion').click(function() {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });

        $('.toastsDefaultDefault').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultTopLeft').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'topLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomRight').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomRight',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomLeft').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                autohide: true,
                delay: 750,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultNotFixed').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                fixed: false,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultFull').click(function() {
            $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                icon: 'fas fa-envelope fa-lg',
            })
        });
        $('.toastsDefaultFullImage').click(function() {
            $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                image: '<?php echo base_url(); ?>assets/dist/img/user3-128x128.jpg',
                imageAlt: 'User Picture',
            })
        });
        $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultInfo').click(function() {
            $(document).Toasts('create', {
                class: 'bg-info',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultWarning').click(function() {
            $(document).Toasts('create', {
                class: 'bg-warning',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultMaroon').click(function() {
            $(document).Toasts('create', {
                class: 'bg-maroon',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    });
    $(window).on("load", function() {
        $("#preloader").fadeOut();
        $("body").css('overflow','visible');
    })
</script>