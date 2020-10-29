<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manajemen Menu</h1>
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
               Tabel "menu" untuk frontend.
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
                    <th>Nama Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach ($menu as $menu):?>
                <tr align="center">
                  <td><?= $no++  ?></td>    
                  <td><?= htmlspecialchars($menu->nama_menu,ENT_QUOTES,'UTF-8');?></td>
                  <td><?= htmlspecialchars($menu->url,ENT_QUOTES,'UTF-8');?></td>
                  <td><?= $menu->icon  ?></td>
                  <td>
                    <!-- link untuk edit menu -->
                    <?= anchor("menu/editMenu/".$menu->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                    <!-- link untuk menghapus menu -->
                    <?= anchor("menu/hapusMenu/".$menu->id, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                      
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>

           </div>

           <div class="card-footer">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i> Tambah Menu
              </button>
           </div>
         </div>
       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
  </section>
  <!-- /.content -->

   <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/tambahMenu')  ?>" method="post" >
          <div class="modal-body">
              <div class="form-group">
                <label for="namaMenu">Nama Menu</label>
                <input type="text" name="nama_menu" id="namaMenu" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="urlMenu">Url Menu</label>
                <input type="text" name="url" id="urlMenu" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="iconMenu">Icon Menu</label>
                <input type="text" name="icon" id="iconMenu" class="form-control" required>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
