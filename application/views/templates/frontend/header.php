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
    <!-- Navigation Bottom -->
    <style>
        /*
          Navigation Buttom (Muncul hanya ketika di versi mobile atau tablet)
        */
        #menu-bottom.nav {
            z-index: 999999;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
            /*overflow: hidden;*/
        }

        #menu-bottom .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            overflow: hidden;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 13px;
            color: #444444;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }

        #menu-bottom .nav__link:hover {
            background-color: #eeeeee;
        }

        #menu-bottom .nav__link--active {
            color: #009578;
        }

        .nav__icon {
            font-size: 18px;
        }
        footer.main-footer{
          margin-bottom: 55px
        }
        .jumbotron .container{
          position: relative;
          z-index: 88;
        }
        .jumbotron{
          background-image: url(<?= base_url('assets/backend/dist/img/photo4.jpg')  ?>);
          background-size: cover;
          height: 540px;
          position: relative;
        }
        .jumbotron::after{
          content: '';
          display: block;
          width: 100%;
          height: 100%;
          background-image: linear-gradient(to bottom right ,rgba(0,0,0,.8), rgba(0,0,0,.1));
          position: absolute;
          /*bottom: 0;*/
        }
        .jumbotron .display-4{
          color: white;
          text-align: center;
          font-weight: 300px;
          text-shadow: 1px 1px 1px rgba(0,0,0.7);
          font-size: 40px;
        }
        .main-header .container .navbar-brand .brand-text{
          color: black  !important;   
        }
        #nav-link{
          text-transform: capitalize;
        }
       
       /* hilangkan ketika berada selain di versi mobile */
       @media (min-width: 992px){
          .main-header{
            border: none !important;
          }

          .main-header .container .navbar-brand .brand-text{
            color: white !important;   
          }

          .nav-link{
            color: white !important;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.7);
          }

           #menu-bottom.nav {
            display: none  !important;
           }

           footer.main-footer{
            margin-bottom: 0;
           }

           .nav-link:hover::after,.nav-link.active::after{
            content: '';
            display: block;
            border-bottom: 3px solid #0b63dc;
            width: 50%;
            margin: auto;
            padding-bottom: 5px;
            margin-bottom: -8px
           }

           .jumbotron{
            margin-top: -75px;
            height: 640px
           }

           .jumbotron .display-4{
              font-size: 40px;
           }
           .tombol{
            text-transform: uppercase;
            border-radius: 40px;
           }
       }

    </style>
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