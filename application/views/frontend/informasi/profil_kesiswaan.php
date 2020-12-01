<?php foreach ($profil_kesiswaan as $profil): ?> 
<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Profil Kesiswaan <br> <span style="font-size: 0.7em"> SMK MAARIF NU 1 AJIBARANG </span> </h1>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container">
    <h3>Profil Kesiswaan</h3>
      <div class="row no-gutters">
        <div class="col-md-4" style="display: flex; justify-content: center;" >
          <img src="<?= base_url('assets/backend/dist/img/').$profil->gambar  ?>" class="card-img" alt="<?= $profil->gambar  ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title"><?= $profil->judul  ?></h3>
            <p class="card-text"><?= $profil->keterangan  ?></p>

          </div> <!-- end card body -->
        </div> <!-- end col -->
      </div> <!-- end row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?php endforeach ?>