<!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="<?= base_url('assets/frontend/')  ?>images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <p>
                                <strong><i class="fa fa-phone"></i></strong> +62 838 4451 4417 &nbsp;
                                <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:#">team01@sch.id</a>
                            </p>
                        </div><!-- end left -->
                        <div class="col-md-6 col-sm-6 hidden-xs text-right">
                            <div class="social">
                                <a class="facebook" href="#" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                <a class="twitter" href="#" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a class="google" href="#" data-tooltip="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a class="linkedin" href="#" data-tooltip="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                <a class="pinterest" href="#" data-tooltip="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div><!-- end social -->
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> -->
                        <div class="logo-normal">
                            <a class="navbar-brand" href="<?= base_url()  ?>"><img src="<?= base_url('assets/frontend/')  ?>images/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= base_url()  ?>">Home</a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Organisasi <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="shop.html">Osis</a></li>
                                    <li><a href="shop-single.html">Pramuka</a></li>
                                    <li><a href="shop-single.html">IPNU IPPNU</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url('auth/login')  ?>">Login</a></li>
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>