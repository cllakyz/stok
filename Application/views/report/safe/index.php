<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Kasa Rapor Listesi</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kasa Adı</th>
                                <th>Giriş Adet</th>
                                <th>Toplam Gider</th>
                                <th>Çıkış Adet</th>
                                <th>Toplam Gelir</th>
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