<?php
$customer = $this->model("customerModel")->customerInfo($data->customer_id)['data'];
?>
<div class="container-fluid pt-8">
    <div class="row invoice">
        <div class="col-md-12">
            <div class="card-box card shadow">
                <div class="card-body border-bottom">
                    <div class="clearfix">
                        <div class="float-left">
                            <h3 class="logo mb-0">#<?php echo $data->order_code; ?></h3>
                        </div>
                        <div class="float-right">
                            <h3 class="mb-0">Tarih: <?php echo date('d/m/Y', strtotime($data->order_date)); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <h4><strong>Faturayı Kesen: </strong></h4>
                                    <address>
                                        <strong>Stok</strong><br>İstanbul<br>Telefon: 05057510467
                                    </address>
                                </div>
                                <div class="float-right text-right">
                                    <h4><strong>Fatura Kesilen: </strong></h4>
                                    <address>
                                        <strong><?php echo $customer->company; ?> </strong><br><?php echo $customer->address; ?><br>
                                        Telefon: <?php echo $customer->phone; ?>
                                    </address>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->
                        <?php
                        $products = json_decode($data->products, TRUE);
                        ?>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered m-t-30 text-nowrap">
                                        <thead >
                                        <tr>
                                            <th>ID</th>
                                            <th>Ürün Adı</th>
                                            <th>Birim</th>
                                            <th>Birim Fiyat</th>
                                            <th class="text-right">Toplam(TL)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(count($products) > 0){
                                            foreach ($products as $p){ ?>
                                                <tr>
                                                    <td><?php echo $p['id']; ?></td>
                                                    <td><?php echo $this->model("productModel")->productInfo($p['id'])['data']->name; ?></td>
                                                    <td><?php echo $p['unit']; ?></td>
                                                    <td><?php echo helper::currencyPrice($p['price']); ?></td>
                                                    <td class="text-right"><?php echo helper::currencyPrice($p['unit']*$p['price']); ?></td>
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
                        <div class="row">
                            <div class="col-xl-4 col-12 offset-xl-8">
                                <h4 class="text-right text-xl"> Toplam Tutar : <?php echo helper::currencyPrice($data->total_price); ?></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="d-print-none">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Yazdır</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>