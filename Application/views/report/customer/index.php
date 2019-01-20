<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Müşteri Rapor Listesi</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php //helper::p($data); ?>
                        <table class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ad Soyad</th>
                                <th>Alınan Ürün Adeti</th>
                                <th>Satılan Ürün Adeti</th>
                                <th>Harcanan Tutar</th>
                                <th>Kazanılan Tutar</th>
                                <th>Kalan Tutar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr class="datatable-row row_<?php echo $d->id; ?>">
                                        <td><?php echo $d->id; ?></td>
                                        <td><?php echo $d->name." ".$d->surname; ?></td>
                                        <td><?php echo $d->received_qty; ?></td>
                                        <td><?php echo $d->sold_qty; ?></td>
                                        <td><?php echo helper::currencyPrice($d->received_price); ?></td>
                                        <td><?php echo helper::currencyPrice($d->sold_price); ?></td>
                                        <td><?php echo helper::currencyPrice($d->sold_price - $d->received_price); ?></td>
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