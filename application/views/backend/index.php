<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
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
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal_tambah_informasi">Tambah Informasi</button>
         <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">
              Tabel Informasi Landing Page.
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

           <table id="example2" class="table table-bordered table-striped">
             <thead class="bg-success text-light">
               <tr align="center">
                   <th width="30px">#</th>
                   <th>Judul</th>
                   <th>Keterangan</th>
                   <th>Status</th>
                   <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($landing_page as $page):?>
               <tr align="center">
                 <td><?= $no++  ?></td>    
                 <td><?= $page->judul ?></td>
                 <td><?= $page->keterangan ?></td>
                 <td>
                   <?php if ($page->is_tampil == 1): ?>
                     <span class="badge badge-pill badge-success">Publish</span>
                     <?php else: ?>
                     <span class="badge badge-pill badge-danger">Draft</span>
                   <?php endif ?>
                 </td>
                 <td>
                   <?= anchor('dashboard/edit_landing_page/'.$page->id, '<div class="mb-1 btn btn-primary btn-sm">Edit</div>');  ?>
                   <?php if ($page->is_tampil == 1): ?>
                   <?= anchor('dashboard/informasi/draft/'.$page->id, '<div class="mb-1 btn btn-danger btn-sm" onclick="return confirm(\' Yakin ingin disembunyikan? \')">Sembunyikan</div>');  ?>
                     <?php else: ?>
                   <?= anchor('dashboard/informasi/show/'.$page->id, '<div class="mb-1 btn btn-info btn-sm">Tampilkan</div>');  ?>
                   <?php endif ?>
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->   	

<!-- Modal -->
<div class="modal fade" id="modal_tambah_informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('dashboard/tambah_informasi')  ?>" method="post">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" class="form-control"  value="<?= set_value('judul')  ?>" name="judul" placeholder="Judul Informasi" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="status">Status</label>
                <select name="is_tampil" class="form-control" id="status">
                  <option value="0">Draft</option>
                  <option value="1">Publish</option>
                </select>
              </div>
            </div>
          </div>
          <!-- end row -->

          <div class="form-group">   
            <label for="keterangan">Keterangan</label>             
            <textarea class="textarea form-control" id="keterangan" name="keterangan" placeholder="Place some text here" value="<?= set_value('keterangan')  ?>"  required ></textarea>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>