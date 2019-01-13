<aside class="app-sidebar ">
    <div class="sidebar-img">
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>"><img alt="..." class="navbar-brand-img main-logo" src="<?php echo IMG_PATH; ?>/brand/logo-dark.png"> <img alt="..." class="navbar-brand-img logo" src="<?php echo IMG_PATH; ?>/brand/logo.png"></a>
        <ul class="side-menu">
            <li>
                <a class="side-menu__item" href="<?php echo SITE_URL; ?>"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Anasayfa</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Kategori Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="<?php echo SITE_URL; ?>/category" class="slide-item">Kategoriler</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/category/add" class="slide-item">Kategori Ekle</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-tag"></i><span class="side-menu__label">Ürün Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="<?php echo SITE_URL; ?>/product" class="slide-item">Ürünler</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/product/add" class="slide-item">Ürün Ekle</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Müşteri Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="<?php echo SITE_URL; ?>/customer" class="slide-item">Müşteriler</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/customer/add" class="slide-item">Müşteri Ekle</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Stok Yönetimi</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="<?php echo SITE_URL; ?>/stock" class="slide-item">Stok İşlemleri</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/stock/add" class="slide-item">Stok Ekle</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>