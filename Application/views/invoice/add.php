<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Fatura Ekle</h2>
                </div>
                <form id="invoice_add_form" action="<?php echo SITE_URL."/invoice/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fatura Tipi</label>
                                    <select name="type" class="form-control required">
                                        <option value="">Lütfen fatura tipi seçiniz</option>
                                        <option value="0">Gelir</option>
                                        <option value="1">Gider</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fatura Numarası</label>
                                    <input type="text" name="no" class="form-control required">
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
                                <div class="form-group">
                                    <label>Toplam Tutar</label>
                                    <input type="number" name="total" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('invoice_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>