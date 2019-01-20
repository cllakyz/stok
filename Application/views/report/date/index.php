<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Ürün Rapor Listesi</h2>
                </div>
                <div class="card-body">
                    <?php
                    $start_date = NULL;
                    $end_date = NULL;
                    if(isset($_GET['start_date']) && $_GET['start_date'] != ""){
                        $start_date = helper::cleaner($_GET['start_date']);
                    }
                    if(isset($_GET['end_date']) && $_GET['end_date'] != ""){
                        $end_date = helper::cleaner($_GET['end_date']);
                    }
                    ?>
                    <form action="<?php echo SITE_URL."/report/date"; ?>" method="get">
                        <div class="input-daterange datepicker row align-items-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span></div>
                                        <input name="start_date" class="form-control required" placeholder="Başlangıç tarihi" type="text" value="<?php echo $start_date; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span></div>
                                        <input name="end_date" class="form-control required" placeholder="Bitiş Tarihi" type="text" value="<?php echo $end_date; ?>">
                                        <span class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fe fe-search"></i></button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ürün Adı</th>
                                <th>Giriş Adet</th>
                                <th>Giriş Fiyat</th>
                                <th>Çıkış Adet</th>
                                <th>Çıkış Fiyat</th>
                                <th>Kalan Adet</th>
                                <th>Kalan Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr class="datatable-row row_<?php echo $d->id; ?>">
                                        <td><?php echo $d->id; ?></td>
                                        <td><?php echo $d->name; ?></td>
                                        <td><?php echo $d->incoming_qty; ?></td>
                                        <td><?php echo helper::currencyPrice($d->incoming_sum); ?></td>
                                        <td><?php echo $d->outcoming_qty; ?></td>
                                        <td><?php echo helper::currencyPrice($d->outcoming_sum); ?></td>
                                        <td><?php echo $d->incoming_qty - $d->outcoming_qty; ?></td>
                                        <td><?php echo helper::currencyPrice($d->outcoming_sum - $d->incoming_sum); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>