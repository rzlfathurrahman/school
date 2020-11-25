<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Portal Kesiswaan <br> <span style="font-size: 0.7em"> SMK MAARIF NU 1 AJIBARANG </span></h1>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container">
    <?php for($i = 0; $i < count($landing_page); $i++) : ?>
        <div class="row">
        
            <section class="section <?= (($i % 2) == 0) ? 'gb' : ''  ?>">
                <div class="container">
                  <h2><?= $landing_page[$i]->judul  ?></h2>
                  <?= $landing_page[$i]->keterangan  ?>
                </div><!-- end container -->
            </section>

        </div>
    <?php endfor; ?>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
