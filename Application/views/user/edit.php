<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php echo $data->name." Kullanıcısını Düzenle"; ?></h2>
                </div>
                <form id="user_edit_form" action="<?php echo SITE_URL."/user/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <input type="text" name="name" class="form-control required" value="<?php echo $data->name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>E-Posta</label>
                                    <input type="email" name="email" class="form-control required" value="<?php echo $data->email; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Şifre <small>(Şifreyi güncellemek için doldurunuz)</small></label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Şifre Tekrar <small>(Şifreyi güncellemek için doldurunuz)</small></label>
                                    <input type="password" name="password_repeat" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('user_edit_form')">DÜZENLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>