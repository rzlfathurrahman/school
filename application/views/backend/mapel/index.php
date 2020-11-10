<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mata Pelajaran</h1>
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
              Tabel Mata Pelajaran.
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
                   <th>Kode Mapel</th>
                   <th>Nama Mapel</th>
                   <th>Kelas</th>
                   <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($mapel as $m):?>
               <tr align="center">
                 <td><?= $no++  ?></td>    
                 <td><?= htmlspecialchars($m->kode_mapel,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($m->nama_mapel,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($m->kode_kelas." ".$m->kode_jurusan,ENT_QUOTES,'UTF-8');?></td>
                 <td>
                   <!-- link untuk edit mapel -->
                   <?= anchor("mapel/editMapel/".$m->kode_mapel, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                   <!-- link untuk menghapus mapel-->
                   <?= anchor("mapel/hapusMapel/".$m->kode_mapel, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                     
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>

          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMapel">
               <i class="fas fa-plus"></i> Tambah Mapel
             </button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
  <!-- modal tambah jurusan -->
   <div class="modal fade" id="modalTambahMapel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Mata Pelajaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('mapel/tambahMapel')  ?>" method="post" >
          <div class="modal-body">
              <div class="form-group">
                <label for="kodeMapel">Kode Mapel</label>
                <input type="text" name="kode_mapel" id="kodeMapel" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="namaMapel">Nama Mapel</label>
                <input type="text" name="nama_mapel" id="namaMapel" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="kode_jurusan">Jurusan</label>
                <select name="kode_jurusan" id="kode_jurusan" class="form-control" required=""> 
                  <option value="#">=== PILIH JURUSAN ===</option>
                  <?php foreach ($jurusan as $j): ?>
                    <option value="<?= $j->kode_jurusan  ?>"><?= $j->kode_jurusan ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kode_kelas" id="kelas" class="form-control">
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
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