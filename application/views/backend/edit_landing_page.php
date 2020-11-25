<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Informasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php foreach ($url as $u): ?>
              <?php if (count($url) == 1): ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "" : ""  ?>"><a href="#"><?= $u  ?></a></li>
              <?php else: ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "active" : ""  ?>"><a href="#"><?= $u  ?></a></li>
              <?php endif; ?>
            <?php endforeach ?>
          </ol>
        </div>
      </div>
      <?= $this->session->flashdata('message');  ?>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row">
      <!-- col -->
      <div class="col-md-12">
      <?= $this->session->flashdata('pesan');  ?>
         <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">
              Edit Informasi Landing Page.
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
          <div class="card-body ">
              <form action="<?= base_url('dashboard/update_informasi')  ?>" method="post">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="hidden" name="id" value="<?= $landing_page->id ?>">
                      <input type="hidden" name="judul_old" value="<?= $landing_page->judul  ?>">
                      <input type="hidden" name="is_tampil_old" value="<?= $landing_page->is_tampil  ?>">
                      <input type="hidden" name="keterangan_old" value="<?= $landing_page->keterangan  ?>">
                      <input type="text" id="judul" class="form-control"  value="<?= $landing_page->judul ?>" name="judul" placeholder="Judul Informasi" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="status">Status</label>
                      <?php if ($landing_page->is_tampil == 1): ?>
                        <div class="btn btn-sm btn-success">Publish</div>
                        <?php else: ?>
                        <div class="btn btn-sm btn-draft">Draftt</div>
                      <?php endif ?>
                      <select name="is_tampil" class="form-control" id="status">
                        <option value="0" <?= ($landing_page->is_tampil == 0) ? 'selected' : ''  ?>>Draft</option>
                        <option value="1" <?= ($landing_page->is_tampil == 1) ? 'selected' : ''  ?>>Publish</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- end row -->

                <div class="form-group">   
                  <label for="keterangan">Keterangan</label>             
                  <textarea class="textarea form-control" id="keterangan" name="keterangan" placeholder="Place some text here" required ><?= $landing_page->keterangan ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->   	
