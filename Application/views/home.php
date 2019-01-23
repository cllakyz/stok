<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 p-3">
        <h3 class="mb-sm-0">Anasayfa</h3>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>"><i class="fe fe-home"></i></a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card p-3 px-4 shadow">
                <div>Toplam Gelir</div>
                <div class="py-2 m-0 text-center h1 text-green"><?php echo helper::currencyPrice($this->model('reportModel')->totalPriceReport(1)); ?></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card p-3 px-4 shadow">
                <div>Toplam Gider</div>
                <div class="py-2 m-0 text-center h1 text-red"><?php echo helper::currencyPrice($this->model('reportModel')->totalPriceReport(0)); ?></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card p-3 px-4 shadow">
                <div>Fark</div>
                <div class="py-2 m-0 text-center h1 text-blue"><?php echo helper::currencyPrice($this->model('reportModel')->totalPriceReport(1)-$this->model('reportModel')->totalPriceReport(0)); ?></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card p-3 px-4 shadow">
                <div>Toplam Ürün</div>
                <div class="py-2 m-0 text-center h1 text-yellow"><?php echo $this->model('reportModel')->totalCustomer(); ?></div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>