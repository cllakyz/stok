<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 p-3">
        <h3 class="mb-sm-0">Anasayfa</h3>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>"><i class="fe fe-home"></i></a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card bg-gradient-primary border-0 overflow-hidden">
                <div class="">
                    <div class="card-body">
                        <img src="<?php echo IMG_PATH; ?>/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Toplam Gelir</h4>
                                <?php $toplamGelir = $this->model('reportModel')->totalPriceReport(1); ?>
                                <h2 class="text-white mb-0"><?php echo helper::currencyPrice($toplamGelir); ?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-shopping-cart text-white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card bg-gradient-warning border-0 overflow-hidden">
                <div class="">
                    <div class="card-body">
                        <img src="<?php echo IMG_PATH; ?>/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Toplam Gider</h4>
                                <?php $toplamGider = $this->model('reportModel')->totalPriceReport(0); ?>
                                <h2 class="text-white mb-0"><?php echo helper::currencyPrice($toplamGider); ?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-dollar-sign text-white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card bg-gradient-danger border-0 overflow-hidden">
                <div class="">
                    <div class="card-body">
                        <img src="<?php echo IMG_PATH; ?>/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Kar-Zarar</h4>
                                <h2 class="text-white mb-0"><?php echo helper::currencyPrice($toplamGelir-$toplamGider); ?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-credit-card success font-large-2 text-white float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <form action="" method="post">
                    <div class="card-header bg-transparent border-0">
                        <h2>Ürün Ara</h2>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Ürün adı" value="<?php echo isset($_POST['search']) ? $_POST['search'] : NULL; ?>">
                            <div class="input-group-append"><button class="btn btn-primary" type="submit">Ara</button></div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['search'])){
                        $data = $this->model("productModel")->productSearch(helper::cleaner($_POST['search']));
                        ?>
                        <div class="">
                            <div class="grid-margin">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap align-items-center">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Ürün Adı</th>
                                                <th>Stok Giriş</th>
                                                <th>Stok Çıkış</th>
                                                <th>Stok Kalan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($data){
                                                foreach ($data as $d){
                                                    $girenAdet = $this->model("reportModel")->productStockActionReport($d->id)->sumQuantity;
                                                    $girenAdet = $girenAdet ? $girenAdet : 0;
                                                    $cikanAdet = $this->model("reportModel")->productStockActionReport($d->id,1)->sumQuantity;
                                                    $cikanAdet = $cikanAdet ? $cikanAdet : 0;
                                                    ?>
                                                    <tr>
                                                        <td class="text-sm font-weight-600"><?php echo $d->id; ?></td>
                                                        <td><?php echo $d->name; ?></td>
                                                        <td><?php echo $girenAdet; ?></td>
                                                        <td><?php echo $cikanAdet; ?></td>
                                                        <td><?php echo $girenAdet-$cikanAdet; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else{ ?>
                                                <tr><td colspan="5" class="text-center">Ürün Bulunamadı!</td></tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>