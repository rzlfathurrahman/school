<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Halaman Edit Profil Siswa</h1>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container">

   <div class="row">
    <div class="col-12">

        <div class="card card-outline card-success">
          <div class="card-header">
            <h4>Form Edit Profil Siswa</h4>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');  ?>
            <form action="<?= base_url('frontend/siswa/update')  ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input required id="nama" type="text" name="nama_siswa" value="<?= $detail->nama_siswa  ?>" readonly class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="nis">Nomor Induk Siswa </label>
                    <input value="<?= set_value('nis')  ?>" name="nis" required id="nis" type="number"  class="form-control" placeholder="Masukan NIS anda" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nisn">Nomor Induk Siswa Nasional </label>
                    <input value="<?= set_value('nisn')  ?>" required type="text" class="form-control" placeholder="Masukan NISN anda" id="nisn" readonly>
                  </div>

                  <div class="form-group">
                    <label for="ttl">Tempat, Tanggal Lahir</label>
                    <input value="<?= $detail->tempat_tgl_lahir  ?>" required type="text" name="tempat_tgl_lahir" class="form-control" placeholder="Masukan Tempat, Tanggal Lahir anda" id="ttl">
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <div class="icheck-primary d-inline">
                       <input  required type="radio" id="radioPrimary1" name="jenis_kelamin" value="1" <?= ($detail->jenis_kelamin == 1) ? "checked" : ""  ?>>
                       <label for="radioPrimary1">
                        Laki - Laki
                       </label>
                     </div>

                     <div class="clear-fix"></div>

                     <div class="icheck-danger d-inline">
                       <input required type="radio" id="radioPrimary2" name="jenis_kelamin" value="2" <?= ($detail->jenis_kelamin == 2) ? "checked" : ""  ?>>
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
                        <option <?= ($detail->kelas == $k->kelas) ? 'selected' : ''  ?> value="<?= $k->kelas  ?>"><?= $k->kelas  ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap Siswa</label>
                    <textarea name="alamat_siswa" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukan nama desa rt/rw,kecamatan,kabupaten"><?= $detail->alamat_siswa  ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="img-input-siswa">Foto Siswa (<span class="text-danger">Maks 1024x768 @2MB</span>)</label><br>
                    <img id="img-preview-siswa" src="<?= base_url('assets/img/'.$detail->foto_siswa)  ?>" class="img-thumbnail"><br>
                    <input id="img-input-siswa" type="file" name="foto" class="form-control-file" onchange="img_preview_siswa()">
                  </div>

                  <div class="form-group">
                    <label for="telepon">Nomor HP</label>
                    <input value="<?= $detail->telepon_siswa  ?>" required type="text" name="telepon_siswa" class="form-control" placeholder="Nomor telepon siswa">
                  </div>
                </div>
                <!-- end form col  -->
                
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="nama">Nama Orang Tua / Wali</label>
                    <input value="<?= $detail->nama  ?>" type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama orang tua / wali">
                  </div>

                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan Orang Tua / Wali</label>
                    <input value="<?= $detail->pekerjaan  ?>" type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan pekerjaan orangtua / wali">
                  </div> 

                  <div class="form-group">
                    <label for="telepon">Nomor Telepon Orang Tua / Wali</label>
                    <input value="<?= $detail->telepon  ?>" type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan nomot telepon aktif orang tua / wali">
                  </div>

                  <div class="form-group">
                    <label>Status</label><br>
                    <div class="icheck-primary d-inline">
                       <input  required type="radio" id="status1" name="is_wali" value="1" <?= ($detail->is_wali == 1) ? 'checked' : '' ?>>
                       <label for="status1">
                        Wali
                       </label>
                     </div>

                     <div class="clear-fix"></div>

                     <div class="icheck-danger d-inline">
                       <input required type="radio" id="status2" name="is_wali" value="0" <?= ($detail->is_wali == 0) ? 'checked' : '' ?>>
                       <label for="status2">
                        Orang Tua
                       </label>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat lengkap orang tua / wali"><?= $detail->alamat  ?></textarea>
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