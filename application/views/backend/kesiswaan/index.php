<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil Kesiswaan</h1>
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
           <div class="card-header">
             <h3 class="card-title">
               Silahkan isi profil kesiswaan dengan editor dibawah.
             </h3>
             <!-- tools box -->
             <div class="card-tools">
               <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                 <i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                       title="Remove">
                 <i class="fas fa-times"></i></button>
             </div>
             <!-- /. tools -->
           </div>
           <!-- /.card-header -->
           <div class="card-body pad">
             <div class="mb-3">
              <form action="<?= base_url('kesiswaan/setProfilKesiswaan')  ?>" method="post">
                <?php foreach ($profil_kesiswaan as $profil): ?> 

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="hidden" name="id" value="<?= $profil->id  ?>">
                        <input type="text" id="judul" class="form-control" name="judul" value="<?= $profil->judul  ?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" id="url" class="form-control" name="url" value="<?= $this->uri->uri_string()  ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                
                   <textarea class="textarea" name="keterangan" placeholder="Place some text here"
                             style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?= $profil->keterangan  ?>
                    </textarea>
                  </div>

                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
             </div>
           </div>
         </div>
       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
  </section>
  <!-- /.content -->