<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php echo $data->name." Ürününü Düzenle"; ?></h2>
                </div>
                <form id="product_edit_form" action="<?php echo SITE_URL."/product/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürün Adı</label>
                                    <input type="text" name="name" class="form-control required" value="<?php echo $data->name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürün Kategorisi</label>
                                    <select name="category_id" class="form-control required">
                                        <option value="">Lütfen kategori seçiniz</option>
                                        <?php
                                        if(count($category) > 0){
                                            foreach ($category as $cat){ ?>
                                                <option<?php echo $cat->id == $data->category_id ? " selected" : NULL; ?> value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="display: block;">Ürün Özellikleri</label>
                            <a href="javascript:;" class="btn btn-info btn-add-modifier">Yeni Özellik Ekle</a>
                        </div>
                        <div class="modifier-div">
                            <?php
                            $modifiers = json_decode($data->modifiers);
                            if(count($modifiers) > 0) {
                                foreach ($modifiers as $i => $modifier) { ?>
                                    <div class="row modifier-row">
                                        <div class="col-md-6">
                                            <label>Özellik Adı</label>
                                            <input type="text" class="form-control modifier-name" name="modifier[<?php echo $i; ?>][name]" value="<?php echo $modifier->name; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Özellik Değeri</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="modifier[<?php echo $i; ?>][value]" value="<?php echo $modifier->value; ?>">
                                                <span class="input-group-append">
                                                    <button class="btn btn-danger btn-remove-modifier" type="button">Sil</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('product_edit_form')">GÜNCELLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>