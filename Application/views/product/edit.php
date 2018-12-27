<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $data->name." Ürününü Düzenle"; ?></h3>
                    </div>
                    <?php
                    if(session::get("status") != ""){
                        echo session::get("status");
                    }
                    ?>
                    <form role="form" action="<?php echo SITE_URL."/product/update/$data->id"; ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data->name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Ürün Kategorisi</label>
                                <select name="category_id" class="form-control">
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
                            <div class="form-group">
                                <label style="display: block;">Ürün Özellikleri</label>
                                <a href="javascript:;" class="btn btn-info btn-add-modifier">Yeni Özellik Ekle</a>
                                <div class="modifier-div">
                                    <?php
                                    $modifiers = json_decode($data->modifiers);
                                    if(count($modifiers) > 0){
                                        //helper::p($modifiers);
                                        foreach ($modifiers as $i => $modifier){ ?>
                                            <div class="col-md-6">
                                                <label>Özellik Adı</label>
                                                <input type="text" class="form-control modifier-name" name="modifier[<?php echo $i; ?>][name]" value="<?php echo $modifier->name; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Özellik Değeri</label>
                                                <input type="text" class="form-control" name="modifier[<?php echo $i; ?>][value]" value="<?php echo $modifier->value; ?>">
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Düzenle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>