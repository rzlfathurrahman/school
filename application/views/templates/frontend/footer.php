 </div>
  <!-- /.content-wrapper -->
<!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y')  ?> <a href="https://smkmaarifnu1ajibarang.sch.id">SMK MA'ARIF NU 1 AJIBARANG</a> | <a href="https://adminlte.io">@AdminLTE.io</a></strong>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/backend/')  ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/backend/')  ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/backend/')  ?>dist/js/adminlte.min.js"></script>
<!-- custom js -->
<script>
	function img_preview_ortu () {
		const input_ortu = document.querySelector('#img-input-ortu');
		const img_ortu = document.querySelector('#img-preview-ortu');
		const file_img_ortu =	new FileReader();
		file_img_ortu.readAsDataURL(input_ortu.files[0]);

		file_img_ortu.onload = function (e) {
			img_ortu.src = e.target.result;
		}
	}
	function img_preview_siswa(){
		const input_siswa = document.querySelector('#img-input-siswa');

		const img_siswa = document.querySelector('#img-preview-siswa');


		const file_img_siswa =	new FileReader();
		file_img_siswa.readAsDataURL(input_siswa.files[0]);

		file_img_siswa.onload = function (e) {
			img_siswa.src = e.target.result;
		}
	}



</script>
</body>
</html>