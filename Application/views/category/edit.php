<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php echo $data->name." Kategorisini Düzenle"; ?></h2>
                </div>
                <form id="category_edit_form" action="<?php echo SITE_URL."/category/update/$data->id"; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Kategori Adı</label>
                                    <input type="text" class="form-control required" name="name" value="<?php echo $data->name; ?>">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 btn btn-block btn-secondary mt-1 mb-1" onclick="post_form('category_edit_form')">GÜNCELLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>