<div class="container-fluid pt-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Kategori Listesi</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example_category" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori Adı</th>
                                <th>Eklenme Tarihi</th>
                                <th>Durumu</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){
                                foreach ($data as $d){ ?>
                                    <tr>
                                        <td><?php echo $d->id; ?></td>
                                        <td><?php echo $d->name; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($d->create_date)); ?></td>
                                        <td><span class="label label-<?php echo $d->status == 1 ? "success" : "danger"; ?>"><?php echo $d->status == 1 ? "Aktif" : "Pasif"; ?></span></td>
                                        <td>
                                            <a href="<?php echo SITE_URL."/category/edit/$d->id"; ?>" class="btn btn-success">Düzenle</a>
                                            <a href="<?php echo SITE_URL."/category/delete/$d->id"; ?>" class="btn btn-danger">Sil</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>