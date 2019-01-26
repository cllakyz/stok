<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Excel Dosyası İle Toplu Ürün Ekleme</h2>
                </div>
                <div class="card-body">
                    <form class="excel_import_form" action="<?php echo SITE_URL."/excel/import"; ?>">
                        <input type="file" name="file" class="dropify" data-height="300" />
                        <button type="submit" class="mt-3 btn btn-block btn-secondary mb-1">YÜKLE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>