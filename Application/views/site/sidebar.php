<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo IMG_PATH; ?>/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->userInfo->name; ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜ</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark"></i>
                    <span>Kategoriler</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo SITE_URL."/category/add"; ?>"><i class="fa fa-circle-o"></i> Yeni Kategori Ekle</a></li>
                    <li><a href="<?php echo SITE_URL."/category"; ?>"><i class="fa fa-circle-o"></i> Kategori Listesi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Ürünler</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo SITE_URL."/product/add"; ?>"><i class="fa fa-circle-o"></i> Yeni Ürün Ekle</a></li>
                    <li><a href="<?php echo SITE_URL."/product"; ?>"><i class="fa fa-circle-o"></i> Ürün Listesi</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>