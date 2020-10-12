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
    <title>Manusa E_Raport</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/user/')  ?>images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/user/')  ?>images/apple-touch-icon.png">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
	
    <!-- Custom & Default Styles -->
	<link rel="stylesheet" href="<?= base_url('assets/user/')  ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/')  ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/')  ?>css/carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/')  ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/')  ?>style.css">

    <!-- material icons -->
    <link rel="stylesheet" href="<?= base_url('assets/login/css/material-icons.css')  ?>">
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
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">dashboard</i>
      <span class="nav__text">Dashboard</span>
    </a>
    <a href="#" class="nav__link nav__link--active">
      <i class="material-icons nav__icon">person</i>
      <span class="nav__text">Profile</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">devices</i>
      <span class="nav__text">Devices</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">lock</i>
      <span class="nav__text">Privacy</span>
    </a>
    <a href="#" class="nav__link">
      <i class="material-icons nav__icon">settings</i>
      <span class="nav__text">Settings</span>
    </a>
  </nav>