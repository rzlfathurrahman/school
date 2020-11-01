<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ekstrakurikuler</h1>
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

    <div class="row">
      <div class="col-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Tabel Ekstrakurikuler.
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
                   <th>Ekstrakurikuler</th>
                   <th>Kode</th>
                   <th>Pembimbing</th>
                   <th>Jadwal</th>
                   <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($ekstrakurikuler as $ekstra):?>
               <tr align="center">
                 <td><?= $no++  ?></td>    
                 <td><?= htmlspecialchars($ekstra->nama_ekstrakurikuler,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->kode_ekstrakurikuler,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->pembimbing,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->jadwal,ENT_QUOTES,'UTF-8');?></td>
                 <td>
                   <!-- link untuk edit ekstra -->
                   <?= anchor("ekstra/editEkstra/".$ekstra->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                   <!-- link untuk menghapus ekstra -->
                   <?= anchor("ekstra/hapusEkstra/".$ekstra->id, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                     
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>

          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
               <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
             </button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
   	