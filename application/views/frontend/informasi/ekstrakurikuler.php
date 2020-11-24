 <section class="section cb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Daftar Ekstrakurikuler</h3>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section" style="margin-bottom: 40px">
  <div class="container">
    <div class="row">

        <?php foreach ($ekstrakurikuler as $eks): ?>
      <div class="col-md-3">
          
        <div class="card">
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
        </div> <!-- end card -->

      </div><!-- end col -->									
        <?php endforeach ?>
    </div><!-- end row -->

  </div><!-- end container -->
</section>