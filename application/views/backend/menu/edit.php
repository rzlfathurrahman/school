<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Menu</h1>
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
              <form action="<?= base_url('menu/updateMenu')  ?>" method="post">
                <?php foreach ($menu as $m): ?>
                  <div class="form-group">
                    <label for="namaMenu">Nama Menu</label>
                    <input type="hidden" name="id" value="<?= $m->id  ?>">
                    <input type="text" name="nama_menu" id="namaMenu" class="form-control" required value="<?= $m->nama_menu  ?>">
                  </div>
                  <div class="form-group">
                    <label for="urlMenu">Url Menu</label>
                    <input type="text" name="url" id="urlMenu" class="form-control"  value="<?= $m->url  ?>">
                  </div>
                  <div class="form-group">
                    <label for="iconMenu">Icon Menu</label>
                    <?php $icon = htmlspecialchars($m->icon) ?>
                    <input type="text" name="icon" id="iconMenu" class="form-control" required value="<?= $icon  ?>">
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