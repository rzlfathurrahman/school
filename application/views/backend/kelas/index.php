<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manajemen Kelas</h1>
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
      <div class="col-6">
        <div class="card card-outline card-info">
          <div class="card-header">
            Tabel Kelas
          </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
             <thead class="bg-success text-light">
               <tr align="center">
                 <th>#</th>
                 <th>Kelas</th>
                 <th>Aksi</th>
               </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($kelas as $k):?>
                 <tr align="center">
                   <td><?= $no++  ?></td>    
                   <td><?= htmlspecialchars($k->kelas,ENT_QUOTES,'UTF-8');?></td>
                   <td>
                     <!-- link untuk edit kelas -->
                     <?= anchor("kelas/edit_kelas/".$k->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?>

                     <!-- link untuk menghapus kelas -->
                     <?= anchor("kelas/hapus_kelas/".$k->id, '<span class="badge badge-pill badge-danger" onclick="return confirm(\' Yakin ingin  menghapus kelas '. $k->kelas .'? \')">Hapus</span>') ;?>
                       
                   </td>
                 </tr>
               <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card card-outline card-success">
          <div class="card-header">
            Form Tambah Kelas
          </div>
          <div class="card-body">
            <form action="<?= base_url('kelas/tambah_kelas')  ?>" method="post" >
              <div class="modal-body">
                 

                <div class="form-group">
                  <label for="tingkat_kelas">Kelas</label>
                  <select class="form-control" name="tingkat" id="tingkat_kelas">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select name="jurusan" id="jurusan" class="form-control">
                    <?php foreach ($jurusan as $j): ?>
                      <option value="<?= $j->kode_jurusan  ?>"><?= $j->nama_jurusan." "."(". $j->kode_jurusan .")"  ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tag">Grade</label> <i class="text-danger">Kosongi jika hanya ada satu kelas.</i>
                  <input type="text" name="tag" class="form-control" placeholder="Misal A / B / C dst... " >
                </div>   

              </div>
              <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>