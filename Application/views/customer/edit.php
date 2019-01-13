<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php echo $data->name." ".$data->surname." Müşterisini Düzenle"; ?></h2>
                </div>
                <form id="customer_edit_form" action="<?php echo SITE_URL."/customer/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" name="name" class="form-control required" value="<?php echo $data->name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>E-Posta</label>
                                    <input type="email" name="email" class="form-control required" value="<?php echo $data->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label>T.C. Kimlik No</label>
                                    <input type="text" name="tc_no" class="form-control required" value="<?php echo $data->tc_no; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea name="address" class="form-control required" cols="30" rows="3"><?php echo $data->address; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Soyad</label>
                                    <input type="text" name="surname" class="form-control required" value="<?php echo $data->surname; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" name="phone" class="form-control required" value="<?php echo $data->phone; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Şirket Adı</label>
                                    <input type="text" name="company" class="form-control required" value="<?php echo $data->company; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Müşteri Notu</label>
                                    <textarea name="note" class="form-control" cols="30" rows="3"><?php echo $data->note; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('customer_edit_form')">GÜNCELLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>