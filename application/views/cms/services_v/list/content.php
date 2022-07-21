<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6  d-flex justify-content-start">
                <h3>Servisler</h3>
            </div>
            <div class="col-12 col-md-6  d-flex justify-content-end">
                <a href="<?php echo base_url('cms/new-services') ?>"><button class="btn btn-success btn-sm"><i class="bi bi-plus-circle-dotted" style="vertical-align: middle; margin-right:5px"></i> Yeni Ekle</button></a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table1" id="table1">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="8%">Icon</th>
                            <th width="8%">Açıklama Görsel</th>
                            <th width="10%">Başlık</th>
                            <th width="30%">Detay</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($item as $servicesItem) {
                            $count++; ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php if ($servicesItem->icon != null) { ?>
                                        <img width="80px" src="<?php echo base_url('assets/uploads/services/icon/' . $servicesItem->icon); ?>">
                                    <?php } else { ?>
                                        <img width="80px" src="<?php echo base_url('assets/uploads/no-photo.png'); ?>">
                                    <?php } ?>
                                </td>
                                <td><?php if ($servicesItem->image != null) { ?>
                                        <img width="80px" src="<?php echo base_url('assets/uploads/services/image/' . $servicesItem->image); ?>">
                                    <?php } else { ?>
                                        <img width="80px" src="<?php echo base_url('assets/uploads/no-photo.png'); ?>">
                                    <?php } ?>
                                </td>
                                <td><?php echo $servicesItem->title ?></td>
                                <td><?php echo substr($servicesItem->description, 0, 185) . '...' ?></td>
                                <td>
                                    <a href="<?php echo base_url('cms/edit-services/' . $servicesItem->Id) ?>" class="btn btn-primary btn-sm text-center m-auto">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('cms/remove-services/' . $servicesItem->Id) ?>" class="btn btn-danger btn-sm text-center m-auto">
                                        <i class="bi bi-x-octagon"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>