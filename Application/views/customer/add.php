<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Yeni Müşteri Ekle</h2>
                </div>
                <form id="customer_add_form" action="<?php echo SITE_URL."/customer/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" name="name" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>E-Posta</label>
                                    <input type="email" name="email" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>T.C. Kimlik No</label>
                                    <input type="text" name="tc_no" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea name="address" class="form-control required" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Soyad</label>
                                    <input type="text" name="surname" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" name="phone" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Şirket Adı</label>
                                    <input type="text" name="company" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Müşteri Notu</label>
                                    <textarea name="note" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('customer_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>