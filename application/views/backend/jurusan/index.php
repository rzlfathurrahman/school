<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jurusan</h1>
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
              Tabel Jurusan.
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
                   <th>Kode Jurusan</th>
                   <th>Jurusan</th>
                   <th>Kepala Jurusan</th>
                   <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($jurusan as $j):?>
               <tr align="center">
                 <td><?= $no++  ?></td>    
                 <td><?= htmlspecialchars($j->kode_jurusan,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($j->nama_jurusan,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($j->kajur,ENT_QUOTES,'UTF-8');?></td>
                 <td>
                   <!-- link untuk edit jurusan -->
                   <?= anchor("jurusan/editJurusan/".$j->kode_jurusan, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                   <!-- link untuk menghapus j -->
                   <?= anchor("jurusan/hapusJurusan/".$j->kode_jurusan, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                     
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>

          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahJurusan">
               <i class="fas fa-plus"></i> Tambah Jurusan
             </button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
  <!-- modal tambah jurusan -->
   <div class="modal fade" id="modalTambahJurusan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Jurusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('jurusan/tambahJurusan')  ?>" method="post" >
          <div class="modal-body">
              <div class="form-group">
                <label for="kodeJurusan">Kode Jurusan</label>
                <input type="text" name="kode_jurusan" id="kodeJurusan" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="namaJurusan">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="namaJurusan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="kajur">Kepala Jurusan</label>
                <select name="kajur" id="kajur" class="form-control" required=""> 
                  <option value="#">=== PILIH KEPALA JURUSAN ===</option>
                  <?php foreach ($kajur as $k): ?>
                    <option value="<?= $k->first_name." ".$k->last_name  ?>"><?= $k->first_name." ".$k->last_name  ?></option>
                  <?php endforeach ?>
                </select>
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