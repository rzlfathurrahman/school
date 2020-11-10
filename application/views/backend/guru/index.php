<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Guru</h1>
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
              Tabel Guru.
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
                   <th>NIP</th>
                   <th>Nama Guru</th>
                   <th>Mapel</th>
                   <th>Kelas</th>
                   <th>Kategori</th>
                   <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
                      <?php var_dump($mapel) ?>
             <?php $no = 1; foreach ($guru as $ekstra):?>
               <tr align="center">
                 <td><?= $no++  ?></td>    
                 <td><?= htmlspecialchars($ekstra->nip,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->nama_guru,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->kode_mapel,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->kelas,ENT_QUOTES,'UTF-8');?></td>
                 <td><?= htmlspecialchars($ekstra->role,ENT_QUOTES,'UTF-8');?></td>
                 <td>
                   <!-- link untuk edit ekstra -->
                   <?= anchor("guru/editEkstra/".$ekstra->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                   <!-- link untuk menghapus ekstra -->
                   <?= anchor("guru/hapusEkstra/".$ekstra->id, '<span class="badge badge-pill badge-danger">Hapus</span>') ;?>
                     
                 </td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

          </div>

          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahGuru">
               <i class="fas fa-plus"></i> Tambah Guru
             </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <!-- modal tambah ekstrakurikuler -->
   <div class="modal fade" id="modalTambahGuru">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Guru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('guru/tambahGuru')  ?>" method="post" >
          <div class="modal-body">
              <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control">
              </div>
              <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" name="nama_guru" id="nama_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="kode_mapel">Kode Mapel</label>
                <select name="kode_mapel" class="form-control" id="kode_mapel">
                  <?php foreach ($mapel as $m): ?>
                    <option value="<?= $m->kode_mapel  ?>"><?= $m->nama_mapel  ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="select2bs4" name="kelas[]" multiple="multiple" data-dropdown-css-class="select2-purple" data-placeholder="Select a State" style="width: 100%;" >
                  <?php foreach ($mapel as $m): ?>
                    <option value="<?= $m->kode_kelas." ".$m->kode_jurusan  ?>"><?= $m->kode_kelas." ".$m->kode_jurusan  ?></option>
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