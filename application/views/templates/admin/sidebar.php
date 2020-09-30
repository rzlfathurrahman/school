<div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class=" text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="<?= base_url('admin/dashboard'); ?>"><img src="<?= base_url(); ?>assets/admin/images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin/dashboard'); ?>"><img src="<?= base_url(); ?>assets/admin/images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="<?= base_url(); ?>assets/admin/images/face.jpg" alt=""></a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class=" sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="<?= base_url(); ?>assets/admin/images/face.jpg" alt="">
            <p class="name"><?= $user['nama']; ?></p>
            <p class="designation">Manager</p>
            <span class="online"></span>
          </div>

          <ul class="nav">

            <?php if ($halaman == "admin/dashboard"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>dashboard">
                <img src="<?= base_url(); ?>assets/admin/images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <?php if ($halaman == "admin/produk"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>produk">
                <img src="<?= base_url(); ?>assets/admin/images/file-icons/64/005-database.png" alt="">
                <span class="menu-title">Produk</span>
              </a>
            </li>

            <?php if ($halaman == "admin/kategori"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>kategori">
                <img src="<?= base_url(); ?>assets/admin/images/file-icons/64/003-interface.png" alt="">
                <span class="menu-title">kategori Produk</span>
              </a>
            </li>

            <?php if ($halaman == "admin/invoice"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>invoice">
                <img src="<?= base_url(); ?>assets/admin/images/icons/005-forms.png" alt="">
                <span class="menu-title">Invoice</span>
              </a>
            </li>

            <?php if ($halaman == "admin/contact"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>admin/contact">
                <img src="<?= base_url(); ?>assets/admin/images/icons/006-letter.png" alt="">
                <span class="menu-title">Contact</span>
              </a>
            </li>

            <?php if ($halaman == "admin/users"): ?>
            <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url(); ?>users">
                <img src="<?= base_url(); ?>assets/admin/images/icons/10.png" alt="">
                <span class="menu-title">Users</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#modalLogout" class="nav-link" data-toggle="modal" data-target="#modalLogout">
                <img src="<?= base_url(); ?>assets/admin/images/icons/003-outbox.png" alt="">
                <span class="menu-title">Logout</span>
              </a>
            </li>

          </ul>
        </nav>

<!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin <strong>Logout?</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <em>Anda perlu login kembali ketika sudah logout. Tekan <i>Cancel</i> untuk membatalkan logout !</em>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <?= anchor('logout', '<div class="btn btn-primary">Yes</div>'); ?>
      </div>
    </div>
  </div>
</div>