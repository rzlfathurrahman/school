<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Kesiswaan | <?= $judul  ?> </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/backend/')  ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/backend/')  ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- material icons -->
  <link rel="stylesheet" href="<?= base_url('assets/frontend/login/css/material-icons.css')  ?>">
  <!-- custom css -->
  <link rel="stylesheet" href="<?= base_url('assets/frontend/style.css')  ?>">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('assets/backend/')  ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

</head>
<body class="hold-transition layout-top-nav">
  <nav id="menu-bottom" class="nav">
        <?php foreach ($menu as $m): ?>
            <a href="<?= base_url().$m->url  ?>" class="nav__link <?= ($halaman == $m->url) ? "nav__link--active"  : "" ?>">
                <?= $m->icon  ?>
                <span class="nav__text"><?= $m->nama_menu  ?></span>
            </a>
        <?php endforeach; ?>
        <?php if ($is_login): ?>
            <a href="<?= base_url('auth/logout')  ?>" class="nav__link" onclick="return confirm('Yakin ingin logout?');">
                <i class="material-icons nav__icon">logout</i>
                <span class="nav__text">logout</span>
            </a>
        <?php else: ?>
            <a href="<?= base_url('auth/login')  ?>" class="nav__link">
                <i class="material-icons nav__icon">login</i>
                <span class="nav__text">login</span>
            </a>
        <?php endif ?>
  </nav>