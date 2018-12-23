<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ürün Listesi</h3>
                    </div>
                    <?php
                    if(session::get("status") != ""){
                        echo session::get("status");
                    }
                    ?>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Ürün Adı</th>
                                <th>Kategori Adı</th>
                                <th>Eklenme Tarihi</th>
                                <th>Durumu</th>
                                <th>İşlemler</th>
                            </tr>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr>
                                        <td><?php echo $d->id; ?></td>
                                        <td><?php echo $d->name; ?></td>
                                        <td><?php echo $d->category_name; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($d->create_date)); ?></td>
                                        <td><span class="label label-<?php echo $d->status == 1 ? "success" : "danger"; ?>"><?php echo $d->status == 1 ? "Aktif" : "Pasif"; ?></span></td>
                                        <td>
                                            <a href="<?php echo SITE_URL."/product/edit/$d->id"; ?>" class="btn btn-success">Düzenle</a>
                                            <a href="<?php echo SITE_URL."/product/delete/$d->id"; ?>" class="btn btn-danger">Sil</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>