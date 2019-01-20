<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Stok İşlemleri Listesi</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example_stock" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ürün Adı</th>
                                <th>Ad Soyad</th>
                                <th>İşlem Tipi</th>
                                <th>Adet</th>
                                <th>Toplam Fiyat</th>
                                <th>Tarih</th>
                                <th class="text-center" width="10%">Durumu</th>
                                <th class="text-right" width="10%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr class="datatable-row row_<?php echo $d->id; ?>">
                                        <td><?php echo $d->id; ?></td>
                                        <td><?php echo $d->product_name; ?></td>
                                        <td><?php echo $d->customer_id != "" ? $d->customer_name." ".$d->customer_surname : "-"; ?></td>
                                        <td><?php echo $d->action_type == 0 ? "Stok Giriş" : "Stok Çıkış"; ?></td>
                                        <td><?php echo $d->quantity; ?></td>
                                        <td><?php echo $d->action_type == 0 ? "-".helper::currencyPrice($d->price*$d->quantity) : helper::currencyPrice($d->price*$d->quantity); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($d->create_date)); ?></td>
                                        <td class="text-center">
                                            <label class="custom-switch">
                                                <input type="checkbox" class="custom-switch-input"<?php echo $d->status == 1 ? " checked" : NULL; ?> data-controller="stock" data-id="<?php echo $d->id; ?>">
                                                <span class="custom-switch-indicator custom-switch-indicator-lg"></span>
                                                <span class="custom-switch-description active">Aktif</span><span class="custom-switch-description passive">Pasif</span>
                                            </label>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-icon btn-pill btn-success mt-1 mb-1" href="<?php echo SITE_URL."/stock/edit/$d->id"; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                                <span class="btn-inner--icon"><i class="fe fe-edit"></i></span>
                                            </a>
                                            <a class="btn btn-sm btn-icon btn-pill btn-danger mt-1 mb-1" onclick="delete_item('stock', '<?php echo $d->id; ?>', this)" data-toggle="tooltip" data-placement="top" title="Sil">
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