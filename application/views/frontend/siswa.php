 <section class="section cb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Profil Saya</h3>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section" style="margin-bottom: 40px">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="row no-gutters">
            <div class="col-md-4" style="display: flex; justify-content: center;" >
              <img src="<?= base_url('assets/backend/dist/img/').$result->foto_siswa  ?>" class="card-img" alt="<?= $result->foto_siswa  ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title"><?= $result->nama_siswa  ?></h3>
                <p class="card-text"><?= $result->kelas  ?></p>

                
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Profil Lengkap</a></li>
                        <li><a data-toggle="tab" href="#menu1">Profil Orang Tua / Wali</a></li>
                    </ul>

                    <div class="tab-content" style="padding: 2em">
                        <div id="home" class="tab-pane fade in active">
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
                        <div id="menu1" class="tab-pane fade" style="margin-bottom: 40px">
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
                    </div>
                <!-- end shop-extra -->

              </div> <!-- end card body -->
            </div> <!-- end col -->
          </div> <!-- end row -->
        </div> <!-- end card -->
      </div><!-- end col -->									
    </div><!-- end row -->

  </div><!-- end container -->
</section>


      