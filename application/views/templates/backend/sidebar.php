<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Hamburger menu -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Hamburger menu -->


    <!-- Right navbar links -->
<!--     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()  ?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user[0]['username']  ?></a>
          <?php foreach ($user_groups as $user_group): ?>
            <span class="float-left m-1 badge badge-pill badge-info"><?= $user_group->name  ?></span>
          <?php endforeach ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard')  ?>" class="nav-link <?= ($halaman == 'dashboard') ? 'active' : ''  ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('menu')  ?>" class="nav-link <?= ($halaman == 'menu') ? 'active' : ''  ?>">
              <i class="nav-icon fas fa-cogs "></i>
              <p>
                Manajemen Menu
              </p>
            </a>
          </li>
          <li class="nav-item <?= ($halaman == 'auth'  || $halaman == 'auth/tambah_pengguna' || $halaman == 'tambah_grup') ? "has-treeview menu-open" : ""  ?> ">
            <a href="#" class="nav-link <?= ($halaman == 'auth'  || $halaman == 'auth/tambah_pengguna' || $halaman == 'tambah_grup') ? "active" : ""  ?>">
              <i class="nav-icon fa fa-users-cog"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('auth/')  ?>" class="nav-link <?= ($halaman == 'auth') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('auth/create_user')  ?>" class="nav-link <?= ($halaman == 'auth/tambah_pengguna') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('auth/create_group')  ?>" class="nav-link  <?= ($halaman == 'tambah_grup') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Grup</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?= ($halaman == 'kesiswaan' || $halaman == 'strukturOrganisasi' || $halaman == 'ekstrakurikuler' || $halaman == 'guru' || $halaman == 'siswa' )  ? "has-treeview menu-open" : ""  ?> ">
            <a href="#" class="nav-link <?= ($halaman == 'kesiswaan' || $halaman == 'strukturOrganisasi' || $halaman == 'ekstrakurikuler' || $halaman == 'guru' || $halaman == 'siswa' ) ? "active" : ""  ?>">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Kesiswaan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kesiswaan') ?>" class="nav-link <?= ($halaman == 'kesiswaan') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Kesiswaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kesiswaan/strukturOrganisasi')  ?>" class="nav-link <?= ($halaman == 'strukturOrganisasi') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Struktur Organisasi</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?= base_url('ekstrakurikuler')  ?>" class="nav-link <?= ($halaman == 'ekstrakurikuler') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekstrakurikuler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('guru')  ?>" class="nav-link <?= ($halaman == 'guru') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('siswa')  ?>" class="nav-link <?= ($halaman == 'siswa') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?= ($halaman == 'jurusan' || $halaman == 'mapel' || $halaman == 'jurusan/tambah_pengguna' || $halaman == 'tambah_grup') ? "has-treeview menu-open" : ""  ?> ">
            <a href="#" class="nav-link <?= ($halaman == 'jurusan'  || $halaman == 'jurusan/tambah_pengguna' || $halaman == 'mapel') ? "active" : ""  ?>">
              <i class="nav-icon fa fa-school"></i>
              <p>
                Manajemen Jurusan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('jurusan/')  ?>" class="nav-link <?= ($halaman == 'jurusan') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mapel')  ?>" class="nav-link <?= ($halaman == 'mapel') ? 'active' : ''  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#modalLogout" data-toggle="modal" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt "></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="modal fade" id="modalLogout">
     <div class="modal-dialog modal-md">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Apakah anda yakin ingin Logout?</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <p>Setelah logout anda perlu login untuk kembali ke halaman ini...</p>
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <a href="<?= base_url('auth/logout')  ?>" class="logout btn btn-outline-primary">Logout</a>
         </div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
  