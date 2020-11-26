<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Halaman Profil Siswa</h1>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container">

   <div class="row">
    <div class="col-12">
      <?php if ($result == null): ?>
         <div class="error-page my-5">
          <h2 class="headline text-warning"> 404</h2>

          <div class="error-content">
            <h4><i class="fas fa-exclamation-triangle text-warning"></i> Maaf! Akun anda belum terdaftar sebagai siswa SMK MA'ARIF NU 1 AJIBARANG.</h4>

            <p>
              Silahkan untuk menghubungi pihak Kesiswaan atau Wali Kelas terkait. 
            </p>

            </form>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      <?php else: ?>
        
      <!-- Custom Tabs -->
      <div class="card">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3"><?= $result->nama_siswa  ?></h3>
          <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Profil Saya</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Profil Orang Tua / Wali</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <!-- card -->
              <div class="card-body mb-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/backend/dist/img/').$result->foto_siswa  ?>" class="card-img" alt="<?= $result->foto_siswa  ?>">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h1 class="card-title font-weight-bold"><?= $result->nama_siswa  ?></h1>
                      <p class="card-text"><?= $result->kelas  ?></p>

                      <table class="table table-bordered table-hover">
                        <tr>
                          <th>NIS</th>
                          <td><?= $result->nis  ?></td>
                        </tr>
                        <tr>
                          <th>NISN</th>
                          <td><?= $result->nisn  ?></td>
                        </tr>
                        <tr>
                          <th>Nama Siswa</th>
                          <td><?= $result->nama_siswa  ?></td>
                        </tr>
                        <tr>
                          <th>Tempat Tanggal Lahir</th>
                          <td><?= $result->tempat_tgl_lahir  ?></td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td><?= $result->jenis_kelamin  ?></td>
                        </tr>
                        <tr>
                          <th>Agama</th>
                          <td><?= $result->nis  ?></td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td><?= $result->alamat  ?></td>
                        </tr>
                        <tr>
                          <th>Sisa Point</th>
                          <td><?= $result->point  ?></td>
                        </tr>
                        <tr>
                          <th>Nomor Telepon</th>
                          <td><?= $result->telepon_siswa  ?></td>
                        </tr>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
             <h3><?= $result->nama  ?></h3>
             <table class="table">
                 <tbody>
                     <tr>
                         <td><strong>Status</strong></td>
                         <td><?= ($result->is_wali == 0) ? 'Orang Tua' : 'Wali'  ?></td>
                     </tr>
                     <tr>
                         <td><strong>Alamat</strong></td>
                         <td><?= $result->alamat  ?></td>
                     </tr>
                     <tr>
                         <td><strong>Pekerjaan</strong></td>
                         <td><?= $result->pekerjaan  ?></td>
                     </tr>
                     <tr>
                         <td><strong>Nomor Telepon</strong></td>
                         <td><?= $result->telepon  ?></td>
                     </tr>
                 </tbody>
             </table>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- ./card -->

      <?php endif ?>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- END CUSTOM TABS -->

  </div><!-- /.container-fluid -->
</div>
<!-- /.content --> 