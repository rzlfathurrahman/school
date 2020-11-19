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
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <?= $this->session->flashdata('message');  ?>
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
                   <?= anchor("ekstrakurikuler/editEkstra/".$ekstra->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                   <!-- link untuk menghapus ekstra -->
                   <?= anchor("ekstrakurikuler/hapusEkstra/".$ekstra->id, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                     
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>

          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahEkstra">
               <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
             </button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
  <!-- modal tambah ekstrakurikuler -->
   <div class="modal fade" id="modalTambahEkstra">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Ekstrakurikuler</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('ekstrakurikuler/tambahEkstrakurikuler')  ?>" method="post" >
          <div class="modal-body">
              <div class="form-group">
                <label for="namaEkstra">Nama Ekstrakurikuler</label>
                <input type="text" name="nama_ekstrakurikuler" id="namaEkstra" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="kodeEkstra">Kode Ekstrakurikuler</label>
                <input type="text" name="kode_ekstrakurikuler" id="kodeEkstra" class="form-control" >
              </div>
              <div class="form-group">
                <label for="pembimbing">Pembimbing</label>
                <select name="pembimbing" class="form-control">
                  <?php foreach ($pembimbing as $p): ?>
                    <option value="<?= $p->first_name." ".$p->last_name  ?>"><?= $p->first_name." ".$p->last_name  ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
               <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <div class="row">
                  <div class="col-2 d-flex justify-content-center align-items-center">
                    Setiap
                  </div> 
                  <div class="col-3 ">
                    <select name="hari" class="form-control">
                      <?php foreach ($hari as $h): ?>
                        <option  value="<?= $h  ?>"><?= $h  ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-3">
                    <select name="jam_mulai" class="form-control">
                      <?php for ($i = 0; $i < count($jam); $i++) : ?>
                        <?php for ($j = 0; $j < count($menit); $j++) : ?>
                          <option value="<?= $jam[$i].".".$menit[$j]  ?>"><?= $jam[$i].".".$menit[$j]  ?></option>
                        <?php endfor ?>
                      <?php endfor ?>
                    </select>
                  </div>
                  <div class="col-1 d-flex justify-content-center align-items-center">
                    -
                  </div> 
                  <div class="col-3">
                    <select name="jam_selesai" class="form-control">
                      <?php for ($i = 0; $i < count($jam); $i++) : ?>
                        <?php for ($j = 0; $j < count($menit); $j++) : ?>
                          <option value="<?= $jam[$i].".".$menit[$j]  ?>"><?= $jam[$i].".".$menit[$j]  ?></option>
                        <?php endfor ?>
                      <?php endfor ?>
                    </select>
                  </div>
                </div>
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