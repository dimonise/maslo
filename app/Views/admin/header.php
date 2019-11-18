<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="/assets/#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/assets/index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/assets/#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="/assets/#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="/assets/#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="/assets/#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/assets/#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="/assets/#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/assets/index3.html" class="brand-link">
            <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/assets/#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo '/';?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Cart</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'cart/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'cart/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Category</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'category/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'category/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Feature</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'feature/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'feature/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Feature Val</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'feature_val/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'feature_val/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>News</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'news/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'news/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Product</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'product/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'product/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Product Cat Link</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'product_cat_link/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'product_cat_link/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Product Feature Val</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'product_feature_val/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'product_feature_val/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Product Img</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'product_img/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'product_img/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Sub Cat</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'sub_cat/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'sub_cat/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Sub Sub Cat</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'sub_sub_cat/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'sub_sub_cat/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>User</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo 'user/add';?>"><i class="fa fa-plus"></i> Добавить</a>
                            </li>
                            <li>
                                <a href="<?php echo 'user/index';?>"><i class="fa fa-list-ul"></i> Просмотр</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
                <!-- /.sidebar -->
    </aside>

            <!-- /.sidebar-menu -->

        <!-- /.sidebar -->

    <div class="content-wrapper">