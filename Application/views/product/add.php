<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yeni Ürün Ekle</h3>
                    </div>
                    <?php
                    if(session::get("status") != ""){
                        echo session::get("status");
                    }
                    ?>
                    <form role="form" action="<?php echo SITE_URL."/product/send"; ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ürün Kategorisi</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Lütfen kategori seçiniz</option>
                                    <?php
                                    if(count($category) > 0){
                                        foreach ($category as $cat){ ?>
                                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
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