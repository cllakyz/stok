<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php echo $data->no." Numaralı Faturayı Düzenle"; ?></h2>
                </div>
                <form id="invoice_edit_form" action="<?php echo SITE_URL."/invoice/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fatura Tipi</label>
                                    <select name="type" class="form-control required">
                                        <option value="">Lütfen fatura tipi seçiniz</option>
                                        <option<?php echo $data->type == 0 ? " selected" : NULL; ?> value="0">Gelir</option>
                                        <option<?php echo $data->type == 1 ? " selected" : NULL; ?> value="1">Gider</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fatura Numarası</label>
                                    <input type="text" name="no" class="form-control required" value="<?php echo $data->no; ?>">
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
                                                <option<?php echo $data->customer_id == $c->id ? " selected" : NULL; ?> value="<?php echo $c->id; ?>"><?php echo $c->name." ".$c->surname; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Toplam Tutar</label>
                                    <input type="number" name="total" class="form-control required" value="<?php echo $data->total; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea name="description" class="form-control" cols="30" rows="3"><?php echo $data->description; ?></textarea>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('invoice_edit_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>