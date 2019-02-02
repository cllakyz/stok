<aside class="app-sidebar ">
    <div class="sidebar-img">
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>"><img alt="..." class="navbar-brand-img main-logo" src="<?php echo IMG_PATH; ?>/brand/stok-logo.png"> <img alt="..." class="navbar-brand-img logo" src="<?php echo IMG_PATH; ?>/brand/stok-logo.png"></a>
        <ul class="side-menu">
            <li><a class="side-menu__item" href="<?php echo SITE_URL; ?>"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Anasayfa</span></a></li>
            <?php
            if($this->model('userModel')->checkPermissionControl($this->userId, "category")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Kategori Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/category" class="slide-item">Kategoriler</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/category/add" class="slide-item">Kategori Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "product")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-tag"></i><span class="side-menu__label">Ürün Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/product" class="slide-item">Ürünler</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/product/add" class="slide-item">Ürün Ekle</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/product/import" class="slide-item">Excel İle Ürün Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "customer")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Müşteri Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/customer" class="slide-item">Müşteriler</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/customer/add" class="slide-item">Müşteri Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "user")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Kullanıcı Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/user" class="slide-item">Kullanıcılar</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/user/add" class="slide-item">Kullanıcı Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "safe")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-unlock"></i><span class="side-menu__label">Kasa Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/safe" class="slide-item">Kasalar</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/safe/add" class="slide-item">Kasa Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "invoice")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-calculator"></i><span class="side-menu__label">Fatura Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/invoice" class="slide-item">Faturalar</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/invoice/add" class="slide-item">Fatura Ekle</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "stock")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Stok Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/stock" class="slide-item">Stok İşlemleri</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/stock/add" class="slide-item">Stok Oluştur</a></li>
                    </ul>
                </li>
            <?php
            }
            if($this->model('userModel')->checkPermissionControl($this->userId, "report")){ ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">Raporlar</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo SITE_URL; ?>/report/product" class="slide-item">Ürün Raporları</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/report/customer" class="slide-item">Müşteri Raporları</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/report/date" class="slide-item">Tarih Bazlı Ürün Raporları</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/report/safe" class="slide-item">Kasa Raporları</a></li>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</aside>