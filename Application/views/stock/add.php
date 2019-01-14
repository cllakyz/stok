<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Yeni Stok İşlemi Ekle</h2>
                </div>
                <form id="stock_add_form" action="<?php echo SITE_URL."/stock/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürün</label>
                                    <select name="product_id" class="form-control required">
                                        <option value="">Lütfen ürün seçiniz</option>
                                        <?php
                                        if(count($product) > 0){
                                            foreach ($product as $p){ ?>
                                                <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>İşlem Tipi</label>
                                    <select name="action_type" class="form-control required">
                                        <option value="">Lütfen işlem tipi seçiniz</option>
                                        <option value="0">Stok Giriş</option>
                                        <option value="1">Stok Çıkış</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Müşteri</label>
                                    <select name="customer_id" class="form-control required">
                                        <option value="">Lütfen müşteri seçiniz</option>
                                        <?php
                                        if(count($customer) > 0){
                                            foreach ($customer as $c){ ?>
                                                <option value="<?php echo $c->id; ?>"><?php echo $c->name." ".$c->surname; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="row two-group">
                                    <div class="form-group col-md-6 group-div">
                                        <label>Adet</label>
                                        <input type="number" name="quantity" class="form-control required">
                                    </div>
                                    <div class="form-group col-md-6 group-div">
                                        <label>Birim Fiyat</label>
                                        <input type="number" name="price" class="form-control required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('stock_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>