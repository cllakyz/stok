<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Stok İşlemleri" name="description">
    <meta content="celalakyuz" name="author">
    <!-- Title -->
    <title>Stok Takip Programı</title>
    <!-- Favicon -->
    <link href="<?php echo IMG_PATH; ?>/brand/stok-logo.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">
    <!-- Icons -->
    <link href="<?php echo CSS_PATH; ?>/icons.css" rel="stylesheet">
    <!-- form Uploads -->
    <link href="<?php echo PLUGIN_PATH; ?>/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?php echo PLUGIN_PATH; ?>/bootstrap/css/bootstrap.min.css">
    <!-- Dashboard CSS -->
    <link href="<?php echo CSS_PATH; ?>/dashboard.css" rel="stylesheet" type="text/css">
    <!-- Data table css -->
    <link href="<?php echo PLUGIN_PATH; ?>/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo PLUGIN_PATH; ?>/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
    <!-- Tabs CSS -->
    <link href="<?php echo PLUGIN_PATH; ?>/tabs/style.css" rel="stylesheet" type="text/css">
    <!-- Custom scroll bar css-->
    <link href="<?php echo PLUGIN_PATH; ?>/customscroll/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <!-- sweetalert css-->
    <link href="<?php echo PLUGIN_PATH; ?>/sweet-alert/sweetalert.css" rel="stylesheet" />
    <!-- Sidemenu Css -->
    <link href="<?php echo PLUGIN_PATH; ?>/toggle-sidebar/css/sidemenu.css" rel="stylesheet">
    <!-- iziToast Css -->
    <link href="<?php echo CSS_PATH; ?>/iziToast.min.css" rel="stylesheet" type="text/css">
    <!--Select2 css-->
    <link rel="stylesheet" href="<?php echo PLUGIN_PATH; ?>/select2/select2.css">
    <script>
        var site_url = "<?php echo SITE_URL; ?>";
    </script>

</head>
<body class="app sidebar-mini rtl" >
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->
                        <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div><input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Top navbar -->
                    <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
                                <img src="<?php echo IMG_PATH; ?>/brand/logo-dark.png" class="navbar-brand-img" alt="...">
                            </a>
                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">
                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="<?php echo IMG_PATH; ?>/faces/male/1.jpg"></span>

                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title text-center border-bottom pb-3">
                                            <h3 class="text-capitalize text-dark mb-1"><?php echo $this->userInfo->name; ?></h3>
                                            <h6 class="text-overflow m-0">Yönetici</h6>
                                        </div>
                                        <a class="dropdown-item" href="<?php echo SITE_URL."/user/edit/".$this->userInfo->id; ?>"><i class="ni ni-single-02"></i> <span>Profilim</span></a>
                                        <a class="dropdown-item" href="<?php echo SITE_URL."/logout"; ?>"><i class="ni ni-user-run"></i> <span>Çıkış Yap</span></a>
                                    </div>
                                </li>
                                <li class="nav-item d-none d-md-flex">
                                    <div class="dropdown d-none d-md-flex mt-2 ">
                                        <a class="nav-link full-screen-link  pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->