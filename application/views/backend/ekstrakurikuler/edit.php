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
    <div class="row">
       <div class="col-md-12">
         <div class="card card-outline card-info">
           <div class="card-body">
              <form action="<?= base_url('ekstrakurikuler/updateEkstrakurikuler')  ?>" method="post">
                <?php foreach ($ekstrakurikuler as $ekstra): ?>
                  <div class="form-group">
                    <label for="namaekstrakurikuler">Nama ekstrakurikuler</label>
                    <input type="hidden" name="id" value="<?= $ekstra->id  ?>">
                    <input type="text" name="nama_ekstrakurikuler" id="namaekstrakurikuler" class="form-control" required value="<?= $ekstra->nama_ekstrakurikuler  ?>">
                  </div>
                  <div class="form-group">
                    <label for="kode_ekstrakurikuler">Kode Ekstrakurikuler</label>
                    <input type="text" name="kode_ekstrakurikuler" id="kode_ekstrakurikuler" class="form-control"  value="<?= $ekstra->kode_ekstrakurikuler  ?>">
                  </div>
                  <div class="form-group">
                    <label for="pembimbing">Pembimbing</label>
                    <input type="text" name="pembimbing" id="pembimbing" class="form-control" required value="<?= $ekstra->pembimbing  ?>">
                  </div>
                  <div class="form-group">
                    <label for="jadwal">Jadwal</label>
                    <input type="text" name="jadwal" id="jadwal" class="form-control" required value="<?= $ekstra->jadwal  ?>">
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