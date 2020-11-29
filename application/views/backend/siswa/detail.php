<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Siswa <u> <?= $result->nama_siswa  ?></h1> </u>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php foreach ($url as $u): ?>
              <?php if (count($url) == 1): ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "" : ""  ?>"><a href="#" style="cursor: not-allowed;"><?= $u  ?></a></li>
              <?php else: ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "active" : ""  ?>"><a href="#" style="cursor: not-allowed;"><?= $u  ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
   <?= $this->session->flashdata('message');  ?>
    <div class="row">
       <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-info">
            Data Lengkap Siswa
          </div>
          <div class="card-body">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?= base_url('assets/img/')  ?><?= $result->foto_siswa  ?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h5 class="widget-user-username"><?= $result->nama_siswa  ?></h5>
                <h6 class="widget-user-desc"><?= $result->kelas  ?></h6>
              </div>
              <div class="card-footer">
                <table class="table table-hover table-bordered">
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
                    <td><?= ($result->jenis_kelamin == 1) ? 'Laki - Laki' : 'Perempuan'  ?></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td><?= $result->agama  ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?= $result->alamat_siswa  ?></td>
                  </tr>
                  <tr>
                    <th>Point</th>
                    <td><?= $result->point  ?></td>
                  </tr>
                  <tr>
                    <th>Nomor Telepon</th>
                    <td><?= $result->telepon_siswa ?></td>
                  </tr>
                  <tr>
                    <th>Lulus</th>
                    <td>
                      <?php if ($result->lulus == 0): ?>
                        <span class="badge badge-pill badge-info">Belum Lulus</span>
                      <?php elseif($result->lulus == -1) : ?>
                        <span class="badge badge-pill badge-danger">Tidak Lulus</span>
                      <?php else: ?>
                        <span class="badge badge-pill badge-success">Lulus</span>
                      <?php endif ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
       </div>
       <!-- /.col-->
       <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary">
            Data Orang Tua / Wali
          </div>
          <div class="card-body">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?= base_url('assets/img/')  ?><?= $result->foto  ?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h5 class="widget-user-username"><?= $result->nama  ?></h5>
                <h6 class="widget-user-desc"><?= ($result->is_wali == 0) ? 'Orang Tua' : 'Wali'  ?></h6>
              </div>
              <div class="card-footer">
               <table class="table table-bordered table-hover">
                 <tr>
                   <th>Nomor Telepon</th>
                   <td><?= $result->telepon  ?></td>
                 </tr>
                 <tr>
                   <th>Alamat</th>
                   <td><?= $result->alamat  ?></td>
                 </tr>
                 <tr>
                   <th>Status</th>
                   <td><?= ($result->is_wali == 0) ? 'Orang Tua' : 'Wali'  ?></td>
                 </tr>
                 <tr>
                   <th>Pekerjaan</th>
                   <td><?= $result->pekerjaan ?></td>
                 </tr>
               </table>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
       </div>
       <!-- /.col-->
       <a href="<?= base_url('siswa/kelas/RPL')  ?>" class="btn btn-danger ml-2 mb-2">Kembali</a>
     </div>
     <!-- ./row -->
  </section>
  <!-- /.content -->