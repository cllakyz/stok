<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Yeni Sipariş Ekle</h2>
                </div>
                <form id="order_add_form" action="<?php echo SITE_URL."/order/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürün Seçimi</label>
                                    <select name="products[]" class="form-control select2 w-100 required" multiple data-placeholder="Ürün seçiniz">
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
                                    <label>Sipariş Tarihi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="order_date" class="form-control datepicker required" placeholder="AA/GG/YYYY">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Müşteri</label>
                                    <select name="customer_id" class="form-control select2 w-100 required">
                                        <option value="">Müşteri seçiniz</option>
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
                                <div class="form-group">
                                    <label class="form-label">Sipariş Tutarı</label>
                                    <input type="number" class="form-control required" name="total_price">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('order_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>