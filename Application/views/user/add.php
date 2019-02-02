<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Yeni Kullanıcı Ekle</h2>
                </div>
                <form id="user_add_form" action="<?php echo SITE_URL."/user/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <input type="text" name="name" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>E-Posta</label>
                                    <input type="email" name="email" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Şifre</label>
                                    <input type="password" name="password" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Şifre Tekrar</label>
                                    <input type="password" name="password_repeat" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Yetkiler</h3>
                                <div class="selectgroup selectgroup-pills">
                                    <?php
                                    foreach (PERMISSIONS as $key => $value){ ?>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="permissions[]" value="<?php echo $key; ?>" class="selectgroup-input">
                                            <span class="selectgroup-button"><?php echo $value; ?></span>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('user_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>