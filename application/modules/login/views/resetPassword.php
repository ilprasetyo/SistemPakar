<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Reset Password</title>
    <link rel="apple-touch-icon" href="<?php base_url() ?>../../assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>../../assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>../../assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?><?php base_url() ?><?php base_url() ?>../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                    <img src="<?php base_url() ?>../../assets/images/pages/forgot-password.png" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2 py-1">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Reset Password Anda</h4>
                            </div>
                        </div>
                        <p class="px-2 mb-0">Silahkan masukan password baru anda.</p>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php base_url() ?>../reset_password_act" method="post">
                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru">
                                        <label for="inputEmail">Password Baru</label>

                                        <input type="hidden" id="kode" name="kode" class="form-control" value="<?php echo $kode ?>" placeholder="Password Baru">
                                    </div>
                                </form>
                                <div class="float-md-right d-block mb-2">
                                    <a href="#" class="btn btn-primary btn-block px-75">Ganti Password</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- END: Theme JS-->
    <script src="<?php base_url() ?>../../assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php base_url() ?>../../assets/js/core/app-menu.min.js"></script>
    <script src="<?php base_url() ?>../../assets/js/core/app.min.js"></script>
    <script src="<?php base_url() ?>../../assets/js/scripts/components.min.js"></script>
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>
