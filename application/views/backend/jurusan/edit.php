<!--- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Jurusan</h1>
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
              <form action="<?= base_url('jurusan/updateJurusan')  ?>" method="post">
                <?php foreach ($jurusan as $j): ?>
                  <div class="form-group">
                    <label for="kode_jurusan">Kode jurusan</label>
                    <input type="hidden" name="kode_jurusan_lama" value="<?= $j->kode_jurusan  ?>">
                    <input type="hidden" name="jurusan_lama" value="<?= $j->nama_jurusan  ?>">
                    <input type="hidden" name="kajur_lama" value="<?= $j->kajur  ?>">

                    <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control"  value="<?= $j->kode_jurusan  ?>">
                  </div>
                  <div class="form-group">
                    <label for="namajurusan">Nama jurusan</label>
                    <input type="text" name="nama_jurusan" id="namajurusan" class="form-control" required value="<?= $j->nama_jurusan  ?>">
                  </div>
                  <div class="form-group">
                    <label for="kajur">Kepala Jurusan (<i class="font-weight-light text-primary">Sebelumnya <?= $j->kajur  ?></i>)</label>
                    <select name="kajur" id="kajur" class="form-control" required=""> 
                      <?php foreach ($kajur as $k): ?>
                        <option value="<?= $k->first_name." ".$k->last_name  ?>"><?= $k->first_name." ".$k->last_name  ?></option>
                      <?php endforeach ?>
                    </select>
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