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

    <!-- row -->
    <div class="row">
      <!-- col -->
      <div class="col-md-12">
        
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Form Tambah Informasi
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
              <textarea class="textarea form-control" placeholder="Place some text here"></textarea>
            </div>
          </div>
        </div>

      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </section>
  <!-- /.content -->
   	