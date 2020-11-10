<!DOCTYPE html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title><?= $judul  ?></title>
    <meta name="keywords" content="login,manusa,kesiswaan">
    <meta name="description" content="Halaman Login Kesiswaan SMK MA'ARIF NU 1 AJIBARANG">
    <meta name="author" content="SMK MANUSA AJB">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/frontend/')  ?>images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend/')  ?>images/apple-touch-icon.png">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
	
    <!-- Custom & Default Styles -->
	<link rel="stylesheet" href="<?= base_url('assets/frontend/')  ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/')  ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/')  ?>css/carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/')  ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/')  ?>style.css">

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
        #copyrights{
            margin-bottom: 55px;
        }
       
       /* hilangkan ketika berada selain di versi mobile */
       @media (min-width: 992px){
           #menu-bottom.nav {
            display: none  !important;
           }
           #copyrights{
            margin-bottom: 0;
           }
       }

    </style>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>
<body>
    <nav id="menu-bottom" class="nav">
        <?php foreach ($menu as $m): ?>
            <a href="<?= base_url().$m->url  ?>" class="nav__link <?= ($halaman == 'home') ? "nav__link--active"  : "" ?>">
            <?= $m->icon  ?>
            <span class="nav__text"><?= $m->nama_menu  ?></span>
        </a>
        <?php endforeach; ?>
  </nav>