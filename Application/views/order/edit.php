<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Sipariş Düzenle</h2>
                </div>
                <form id="order_edit_form" action="<?php echo SITE_URL."/order/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Müşteri</label>
                                    <select name="customer_id" class="form-control required">
                                        <option value="">Müşteri seçiniz</option>
                                        <?php
                                        if(count($customer) > 0){
                                            foreach ($customer as $c){ ?>
                                                <option<?php echo $data->customer_id == $c->id ? " selected": NULL; ?> value="<?php echo $c->id; ?>"><?php echo $c->name." ".$c->surname; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sipariş Tarihi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="order_date" class="form-control datepicker required" placeholder="AA/GG/YYYY" value="<?php echo date('m/d/Y', strtotime($data->order_date)); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="display: block;">Ürünler</label>
                            <a href="javascript:;" class="btn btn-info btn-add-product" data-url="<?php echo SITE_URL."/order/getProductList"; ?>">Ürün Ekle</a>
                        </div>
                        <div class="product-div">
                            <?php
                            $order_products = array();
                            if($order_products != ""){
                                $order_products = json_decode($data->products, TRUE);
                            }
                            if(count($order_products) > 0){
                                foreach ($order_products as $p_key => $op){ ?>
                                    <div class="row product-row">
                                        <div class="col-md-4">
                                            <label>Ürün</label>
                                            <select name="product[<?php echo $p_key; ?>][id]" class="form-control required">
                                                <option value="">Ürün Seçiniz</option>
                                                <?php
                                                foreach ($product as $p){ ?>
                                                    <option<?php echo $op['id'] == $p->id ? " selected" : NULL; ?> value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Birim</label>
                                            <input type="number" class="form-control required" name="product[<?php echo $p_key; ?>][unit]" value="<?php echo $op['unit']; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Birim Fiyatı</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control required" name="product[<?php echo $p_key; ?>][price]" value="<?php echo $op['price']; ?>">
                                                <span class="input-group-append">
                                            <button class="btn btn-danger btn-remove-product" type="button">Sil</button>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            ?>

                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('order_edit_form')">DÜZENLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>