<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Ürün Ekle</h2>
                </div>
                <form id="product_add_form" action="<?php echo SITE_URL."/product/send"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürün Adı</label>
                                    <input type="text" name="name" class="form-control required">
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
                                                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
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

                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('product_add_form')">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>