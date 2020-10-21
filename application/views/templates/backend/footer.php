      <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">MRDN.INC </a> &copy; <script>document.write(new Date().getFullYear());</script>
                <a href="#">Credits - Star Admin</a>
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

  </div>
 <script src="<?= base_url(); ?>assets/backend/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/backend/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/backend/js/misc.js"></script>
  <script src="<?= base_url(); ?>assets/backend/js/chart.js"></script>
  <script src="<?= base_url(); ?>assets/backend/js/maps.js"></script>
  <script type="text/javascript" src="<?= base_url()  ?>assets/DataTables/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
</body>

</html>
