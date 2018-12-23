<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $data->name." Kategorisini Düzenle"; ?></h3>
                    </div>
                    <?php
                    if(session::get("status") != ""){
                        echo session::get("status");
                    }
                    ?>
                    <form role="form" action="<?php echo SITE_URL."/category/update/$data->id"; ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data->name; ?>">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>