<div class="jumbotron d-flex justify-content-center align-items-center jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Ekstrakurikuler <br><span style="font-size: 0.7em"> SMK MAARIF NU 1 AJIBARANG </span></h1>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container">
    <h2>Daftar Ekstrakurikuler</h2>
    <div class="row">

    <?php foreach ($ekstrakurikuler as $eks): ?>
      <div class="col-md-3">

        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h3 class="card-title"><?= $eks->kode_ekstrakurikuler  ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <table class="table table-striped table-bordered">
              <tr>
                <th colspan="1" >Ekstra</th>
                <td><?= $eks->nama_ekstrakurikuler  ?></td>
              </tr>
              <tr>
                <th colspan="1" >Kode</th>
                <td><?= $eks->kode_ekstrakurikuler  ?></td>
              </tr>
              <tr>
                <th >Pembimbing</th>
                <td><?= $eks->pembimbing  ?></td>
              </tr>
              <tr>
                <th>Jadwal</th>
                <td><?= $eks->jadwal  ?></td>
              </tr>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div><!-- end col -->                  
        <?php endforeach ?>
    </div><!-- end row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
