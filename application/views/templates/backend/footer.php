 </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url()  ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()  ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()  ?>assets/backend/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url()  ?>assets/backend/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()  ?>assets/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()  ?>assets/backend/dist/js/demo.js"></script>
  <!-- pace-progress -->
<script src="<?= base_url()  ?>assets/backend/plugins/pace-progress/pace.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url()  ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()  ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()  ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()  ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url()  ?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
</script>
<script>
  $(function () {
    // data table
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    // logout notification
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.logout').click(function() {
      toastr.info('Anda berhasil logout.')
    });

    // Summernote
    $('.textarea').summernote();
  });
</script>

<?php if (!empty($notification)): ?>
  <?= $notification  ?>
<?php endif; ?>
</body>
</html>
