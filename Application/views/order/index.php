<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Sipariş Listesi</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example_order" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>Sipariş Numarası</th>
                                <th>Müşteri Adı</th>
                                <th>Şirket Adı</th>
                                <th>Toplam Tutar</th>
                                <th>Sipariş Tarihi</th>
                                <th class="text-center" width="10%">Durumu</th>
                                <th class="text-right" width="10%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr class="datatable-row row_<?php echo $d->id; ?>">
                                        <td>#<?php echo $d->order_code; ?></td>
                                        <td><?php echo $d->customer_name." ".$d->customer_surname; ?></td>
                                        <td><?php echo $d->customer_company; ?></td>
                                        <td><?php echo helper::currencyPrice($d->total_price); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($d->order_date)); ?></td>
                                        <td class="text-center">
                                            <label class="custom-switch">
                                                <input type="checkbox" class="custom-switch-input"<?php echo $d->status == 1 ? " checked" : NULL; ?> data-controller="order" data-id="<?php echo $d->id; ?>">
                                                <span class="custom-switch-indicator custom-switch-indicator-lg"></span>
                                                <span class="custom-switch-description active">Aktif</span><span class="custom-switch-description passive">Pasif</span>
                                            </label>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-icon btn-pill btn-info mt-1 mb-1" href="<?php echo SITE_URL."/order/detail/$d->id"; ?>" data-toggle="tooltip" data-placement="top" title="Detay">
                                                <span class="btn-inner--icon"><i class="fe fe-search"></i></span>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-pill btn-success mt-1 mb-1" href="<?php echo SITE_URL."/order/edit/$d->id"; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                <span class="btn-inner--icon"><i class="fe fe-edit"></i></span>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-pill btn-danger mt-1 mb-1" onclick="delete_item('order', '<?php echo $d->id; ?>', this)" data-toggle="tooltip" data-placement="top" title="Sil">
                                                <span class="btn-inner--icon"><i class="fe fe-trash"></i></span>
                                            </a>
                                        </td>
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