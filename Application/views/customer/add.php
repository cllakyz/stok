<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yeni Müşteri Ekle</h3>
                    </div>
                    <?php
                    if(session::get("status") != ""){
                        echo session::get("status");
                    }
                    ?>
                    <form role="form" action="<?php echo SITE_URL."/customer/send"; ?>" method="post">
                        <div class="box-body">
                            <div class="row two-group">
                                <div class="form-group col-md-6 group-div">
                                    <label>Ad</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-6 group-div">
                                    <label>Soyad</label>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                            </div>
                            <div class="row two-group">
                                <div class="form-group col-md-6 group-div">
                                    <label>E-Posta</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group col-md-6 group-div">
                                    <label>Telefon</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="row two-group">
                                <div class="form-group col-md-6 group-div">
                                    <label>T.C. Kimlik No</label>
                                    <input type="text" name="tc_no" class="form-control">
                                </div>
                                <div class="form-group col-md-6 group-div">
                                    <label>Şirket Adı</label>
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>
                            <div class="row two-group">
                                <div class="form-group col-md-6 group-div">
                                    <label>Adres</label>
                                    <textarea name="address" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-6 group-div">
                                    <label>Müşteri Notu</label>
                                    <textarea name="note" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>