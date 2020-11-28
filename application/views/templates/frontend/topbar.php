<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md">
    <div class="container">
      <a href="<?= base_url()  ?>" class="navbar-brand">
        <span class="brand-text font-weight-light">KESISWAAN</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <?php foreach ($menu as $m): ?>
              <li class="nav-item">
                <a id="nav-link" class="nav-link <?= ($halaman == $m->url) ? "active"  : "" ?>" href="<?= base_url().$m->url  ?>"><?= $m->nama_menu  ?></a>
              </li>
          <?php endforeach; ?>
          <?php if (empty($result) && $this->ion_auth->logged_in()): ?>
            <li class="nav-item">
              <a id="nav-link" class="nav-link <?= ($halaman == 'tambah siswa') ? "active"  : "" ?>" href="<?= base_url('frontend/siswa/tambah_aksi')  ?>">Daftar</a>
            </li>
          <?php endif ?>
        </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <?php if ($is_login): ?>
              <li class="nav-item"><a class="tombol btn btn-danger" href="<?= base_url('auth/logout')  ?>">Logout</a></li>
          <?php else: ?>
              <li class="nav-item"><a class="tombol btn btn-primary" href="<?= base_url('auth/login')  ?>">Login</a></li>
          <?php endif ?>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">