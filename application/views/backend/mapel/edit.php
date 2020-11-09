<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Mata Pelajaran</h1>
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
       <div class="col-md-12">
         <div class="card card-outline card-info">
           <div class="card-body">
              <form action="<?= base_url('mapel/updateMapel')  ?>" method="post">
                <?php foreach ($mapel as $m): ?>
                  <div class="form-group">
                    <label for="kode_mapel">Kode Mapel</label>
                    <input type="hidden" name="kode_mapel_lama" value="<?= $m->kode_mapel  ?>">
                    <input type="hidden" name="mapel_lama" value="<?= $m->nama_mapel  ?>">
                    <input type="hidden" name="kelas_lama" value="<?= $m->kode_kelas  ?>">
                    <input type="hidden" name="jurusan_lama" value="<?= $m->kode_jurusan  ?>">

                    <input type="text" name="kode_mapel" id="kode_mapel" class="form-control"  value="<?= $m->kode_mapel  ?>">
                  </div>
                  <div class="form-group">
                    <label for="namaMapel">Nama Mapel</label>
                    <input type="text" name="nama_mapel" id="namaMapel" class="form-control" required value="<?= $m->nama_mapel  ?>">
                  </div>
                  <div class="form-group">
                    <label for="jurusan">Jurusan (<i class="font-weight-light text-primary">Sebelumnya <?= $m->kode_jurusan  ?></i>)</label>
                    <select name="jurusan" id="jurusan" class="form-control" required=""> 
                      <?php foreach ($jurusan as $j): ?>
                        <option value="<?= $j->kode_jurusan  ?>"><?= $j->kode_jurusan  ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kode_kelas" id="kelas" class="form-control">
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
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