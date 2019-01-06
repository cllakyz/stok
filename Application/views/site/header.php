<!DOCTYPE html>
<html lang="tr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Fully Responsive Bootstrap 4 Admin Dashboard Template" name="description">
    <meta content="Spruko" name="author">
    <!-- Title -->
    <title>Adon - Creative Admin Multipurpose Responsive Dashboard Template</title>
    <!-- Favicon -->
    <link href="<?php echo IMG_PATH; ?>/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">
    <!-- Icons -->
    <link href="<?php echo CSS_PATH; ?>/icons.css" rel="stylesheet">
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
                            <!-- Horizontal Navbar -->
                            <ul class="navbar-nav align-items-center d-none d-xl-block">
                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                                        Help
                                    </a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                                        Mail <span class="badge badge-yellow badge-circle badge-sm h-5 w-5 text-xs">4</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right ">
                                        <a href="#" class="dropdown-item d-flex text-center">
                                            Mail Box
                                        </a>
                                        <a href="#" class="dropdown-item d-flex text-center">
                                            Compose mail
                                        </a>
                                        <a href="#" class="dropdown-item d-flex text-center">
                                            Seperated Link
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">View all Notification</a>
                                    </div>
                                </li>
                            </ul>

                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
                                <img src="<?php echo IMG_PATH; ?>/brand/logo-dark.png" class="navbar-brand-img" alt="...">
                            </a>

                            <!-- Form -->
                            <form class="navbar-search navbar-search-dark form-inline ml-3  mr-lg-auto">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div><input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </form>
                            <!-- User -->

                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">
                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="<?php echo IMG_PATH; ?>/faces/female/27.jpg"></span>

                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title text-center border-bottom pb-3">
                                            <h3 class="text-capitalize text-dark mb-1">Luna Klippel</h3>
                                            <h6 class="text-overflow m-0">Administrator</h6>
                                        </div>
                                        <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                        <a class="dropdown-item" href="#"><i class=" ni ni-email-83"></i> <span>Chat</span></a>
                                        <a class="dropdown-item" href="#"><i class=" ni ni-single-02"></i> <span>Friends</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" title="languages" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-flag f-30 "></i>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right"><a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="<?php echo IMG_PATH; ?>/flag-img/french_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                            <div>
                                                <strong>French</strong>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="<?php echo IMG_PATH; ?>/flag-img/germany_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                            <div>
                                                <strong>Germany</strong>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="<?php echo IMG_PATH; ?>/flag-img/italy_flag.jpg" alt="flag-img" class="avatar avatar-sm  mr-3 align-self-center">
                                            <div>
                                                <strong>Italy</strong>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="<?php echo IMG_PATH; ?>/flag-img/russia_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                            <div>
                                                <strong>Russia</strong>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex align-items-center">
                                            <img src="<?php echo IMG_PATH; ?>/flag-img/spain_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                            <div>
                                                <strong>Spain</strong>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-bell f-30 "></i>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong>Someone likes our posts.</strong>
                                                <div class="small text-muted">3 hours ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong> 3 New Comments</strong>
                                                <div class="small text-muted">5  hour ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong> Server Rebooted.</strong>
                                                <div class="small text-muted">45 mintues ago</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">View all Notification</a>
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