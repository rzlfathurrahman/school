<!-- - Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Guru</h1>
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
        <?= $this->session->flashdata('pesan');  ?>
         <div class="card card-outline card-info">
           <div class="card-body">
              <form action="<?= base_url('guru/updateGuru')  ?>" method="post">
                <?php foreach ($guru as $guru): ?>
                  <!-- Data guru yg lama -->
                    <input type="hidden" name="id" value="<?= $guru->id  ?>">
                    <input type="hidden" name="nip_lama" value="<?= $guru->nip  ?>">
                    <input type="hidden" name="nama_guru_lama" value="<?= $guru->nama_guru  ?>">
                    <input type="hidden" name="kode_mapel_lama" value="<?= $guru->kode_mapel  ?>">
                    <input type="hidden" name="kelas_lama" value="<?= $guru->kelas  ?>">
                    <input type="hidden" name="role_lama" value="<?= $guru->role  ?>">
                  <!-- ./Data guru yg lama -->
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" placeholder="Masukan NIP (Jika Ada)" value="<?= $guru->nip  ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="nama_guru">Nama Guru</label>
                    <select class="form-control" name="nama_guru" id="nama_guru">
                      <?php foreach ($guru_users as $g): ?>
                        <option value="<?= $g->first_name." ".$g->last_name  ?>" <?= ($g->first_name." ".$g->last_name == $guru->nama_guru) ? 'selected' : ''  ?>><?= $g->first_name." ".$g->last_name  ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                      <?php
                       $kode_mapel = explode(',', $guru->kode_mapel);
                       foreach ($kode_mapel as $k): ?>
                        <a href="#" class="badge badge-primary"><?= $k  ?></a>  
                       <?php endforeach ?> 
                    <select  data-placeholder="Pilih Mata Pelajaran" class="select2bs4" name="kode_mapel[]" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;" >
                      <?php foreach ($mapel as $m): ?>
                        <option value="<?= $m->kode_mapel; ?>" <?= ($m->kode_mapel == $guru->nama_guru) ? 'selected' : ''  ?>><?= $m->kode_mapel  ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <?php
                       $kelas = explode(',', $guru->kelas);
                       foreach ($kelas as $kl): ?>
                        <a href="#" class="badge badge-warning"><?= $kl  ?></a>  
                       <?php endforeach; ?> 
                    <select data-placeholder="Pilih Kelas" class="select2bs4" name="kelas[]" multiple="multiple" data-dropdown-css-class="select2-purple"  style="width: 100%;" >
                      <?php foreach ($mapel as $m): ?>
                        <option value="<?= $m->kode_kelas." ".$m->kode_jurusan  ?>"><?= $m->kode_kelas." ".$m->kode_jurusan  ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kategori Guru</label>
                    <?php
                       $role = explode(',', $guru->role);
                       foreach ($role as $r): ?>
                        <a href="#" class="badge badge-success"><?= $r  ?></a>  
                       <?php endforeach; ?>
                    <select data-placeholder="Pilih Kategori Guru" class="select2bs4" name="role[]" multiple="multiple" data-dropdown-css-class="select2-purple"  style="width: 100%;" >
                      <option value="NA">Normatif Adaptif</option>
                      <option value="Produktif">Produktif</option>
                      <option value="BK">BK</option>
                    </select>
                  </div>
                <?php endforeach ?>
                <button type="submit" name="submit" class="btn btn-info" >Update</button>
              </form>
           </div>
         </div>
       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
  </section>
  <!-- /.content -->