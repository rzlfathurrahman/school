<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Halaman Pendaftaran Siswa</h1>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container">

   <div class="row">
    <div class="col-12">

        <div class="card card-outline card-success">
          <div class="card-header">
            <h4>Form Pendaftaran Siswa</h4>
          </div>
          <div class="card-body">
            <?= $this->session->set_flashdata('message', 'value');  ?>
            <form action="<?= base_url('frontend/siswa/tambah_siswa_aksi')  ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input required id="nama" type="text" name="nama_siswa" value="<?= $user->first_name." ".$user->last_name  ?>" readonly class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="nis">Nomor Induk Siswa </label> <i class="text-danger small">jangan sampai salah mengisikan NIS !</i>
                    <input value="<?= set_value('nis')  ?>" required id="nis" type="number" name="nis" class="form-control" placeholder="Masukan NIS anda">
                  </div>

                  <div class="form-group">
                    <label for="nisn">Nomor Induk Siswa Nasional </label> <i class="text-danger small">jangan sampai salah mengisikan NISN !</i>
                    <input value="<?= set_value('nisn')  ?>" required type="text" name="nisn" class="form-control" placeholder="Masukan NISN anda" id="nisn">
                  </div>

                  <div class="form-group">
                    <label for="ttl">Tempat, Tanggal Lahir</label>
                    <input value="<?= set_value('tempat_tgl_lahir')  ?>" required type="text" name="tempat_tgl_lahir" class="form-control" placeholder="Masukan Tempat, Tanggal Lahir anda" id="ttl">
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <div class="icheck-primary d-inline">
                       <input  required type="radio" id="radioPrimary1" name="jenis_kelamin" value="1" checked>
                       <label for="radioPrimary1">
                        Laki - Laki
                       </label>
                     </div>

                     <div class="clear-fix"></div>

                     <div class="icheck-danger d-inline">
                       <input required type="radio" id="radioPrimary2" name="jenis_kelamin" value="2" >
                       <label for="radioPrimary2">
                        Perempuan
                       </label>
                     </div>
                  </div>

                  <div class="form-group">
                    <label id="agama">Agama</label>
                    <input  required type="text" value="ISLAM" readonly name="agama" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" name="kelas" id="kelas">
                      <?php foreach($kelas as $k) : ?>
                        <option  value="<?= $k->kelas  ?>"><?= $k->kelas  ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap Siswa</label>
                    <textarea name="alamat_siswa" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukan nama desa rt/rw,kecamatan,kabupaten"><?= set_value('alamat')  ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="img-input-siswa">Foto Siswa</label><br>
                    <img id="img-preview-siswa" src="<?= base_url('assets/backend/dist/img/user1-128x128.jpg')  ?>" class="img-thumbnail"><br>
                    <input id="img-input-siswa" required type="file" name="foto" class="form-control-file" onchange="img_preview_siswa()">
                  </div>

                  <div class="form-group">
                    <label for="telepon">Nomor HP</label>
                    <input value="<?= set_value('telepon_siswa')  ?>" required type="text" name="telepon_siswa" class="form-control" placeholder="Nomor telepon siswa">
                  </div>
                </div>
                <!-- end form col  -->
                
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="nama">Nama Orang Tua / Wali</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama orang tua / wali">
                  </div>

                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan Orang Tua / Wali</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan pekerjaan orangtua / wali">
                  </div> 

                  <div class="form-group">
                    <label for="telepon">Nomor Telepon Orang Tua / Wali</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan nomot telepon aktif orang tua / wali">
                  </div>

                  <div class="form-group">
                    <label>Status</label><br>
                    <div class="icheck-primary d-inline">
                       <input  required type="radio" id="status1" name="is_wali" value="1" >
                       <label for="status1">
                        Wali
                       </label>
                     </div>

                     <div class="clear-fix"></div>

                     <div class="icheck-danger d-inline">
                       <input required type="radio" id="status2" name="is_wali" value="0" checked>
                       <label for="status2">
                        Orang Tua
                       </label>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="img-input-ortu">Foto Orang Tua</label><br>
                    <img id="img-preview-ortu" src="<?= base_url('assets/backend/dist/img/user1-128x128.jpg')  ?>" class="img-thumbnail"><br>
                    <input id="img-input-ortu" type="file" name="foto_ortu" class="form-control-file" onchange="img_preview_ortu()">
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat lengkap orang tua / wali"></textarea>
                  </div>

                </div> 
              </div>
              <!-- end form row -->

              <button type="submit" class="btn btn-primary">Kirim</button>

            </form>
          </div>
        </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- END CUSTOM TABS -->

  </div><!-- /.container-fluid -->
</div>
<!-- /.content --> 