<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Ekstrakurikuler</h1>
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
   <div class="alert alert-info" role="alert">Lewati mengisi jadwal, jika jadwal ekstrakurikuler tidak ingin diganti.</div>
    <div class="row">
       <div class="col-md-12">
         <div class="card card-outline card-info">
           <div class="card-body">
              <form action="<?= base_url('ekstrakurikuler/updateEkstrakurikuler')  ?>" method="post">
                <?php foreach ($ekstrakurikuler as $ekstra): ?>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="namaekstrakurikuler">Nama ekstrakurikuler</label>
                        <input type="hidden" name="id" value="<?= $ekstra->id  ?>">
                        <input type="text" name="nama_ekstrakurikuler" id="namaekstrakurikuler" class="form-control" required value="<?= $ekstra->nama_ekstrakurikuler  ?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="kode_ekstrakurikuler">Kode Ekstrakurikuler</label>
                        <input type="text" id="kode_ekstrakurikuler" class="form-control"  value="<?= $ekstra->kode_ekstrakurikuler  ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pembimbing">Pembimbing</label>
                        <select name="pembimbing" id="pembimbing" class="form-control">
                          <option value="h">h</option>
                          <?php foreach ($pembimbing as $p): ?>
                             <option value="<?= $p->first_name." ".$p->last_name  ?>" <?= ($ekstra->pembimbing == $p->first_name." ".$p->last_name) ? 'selected' : ''  ?>><?= $p->first_name." ".$p->last_name  ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      
                      <div class="form-group">
                        <label for="jadwal">Jadwal </label> (<i><?= $ekstra->jadwal; ?></i>)<br>
                        <div class="row">
                          <div class="col-2 d-flex justify-content-center align-items-center">
                            Setiap
                          </div> 
                          <div class="col-2 ">
                            <select name="hari" class="form-control">
                              <option value="#">Hari</option>
                              <?php foreach ($hari as $h): ?>
                                <option  value="<?= $h  ?>"><?= $h  ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          <div class="col-2 d-flex justify-content-center align-items-center">
                            Pukul
                          </div> 
                          <div class="col-2">
                            <select name="jam_mulai" class="form-control">
                              <option value="#">Mulai</option>
                              <?php for ($i = 0; $i < count($jam); $i++) : ?>
                                <?php for ($j = 0; $j < count($menit); $j++) : ?>
                                  <option value="<?= $jam[$i].".".$menit[$j]  ?>"><?= $jam[$i].".".$menit[$j]  ?></option>
                                <?php endfor ?>
                              <?php endfor ?>
                            </select>
                          </div>
                          <div class="col-1 d-flex justify-content-center align-items-center">
                            -
                          </div> 
                          <div class="col-2">
                            <select name="jam_selesai" class="form-control">
                              <option value="#">Selesai</option>
                              <?php for ($i = 0; $i < count($jam); $i++) : ?>
                                <?php for ($j = 0; $j < count($menit); $j++) : ?>
                                  <option value="<?= $jam[$i].".".$menit[$j]  ?>"><?= $jam[$i].".".$menit[$j]  ?></option>
                                <?php endfor ?>
                              <?php endfor ?>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                <?php endforeach ?>
                <button type="submit" name="submit" class="btn btn-primary" >Simpan</button>
              </form>
           </div>
         </div>
       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
  </section>
  <!-- /.content -->