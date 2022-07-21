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
                            <th>#</th>
                            <th>Email</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($item as $newsletterItem) {
                            $count++; ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $newsletterItem->email ?></td>
                                <td><?php $isActive = convertisActiveWithBadge($newsletterItem->isActive);
                                    echo $isActive  ?></td>
                                <td>
                                    <a href="<?php echo base_url('cms/remove-newsletter/' . $newsletterItem->Id) ?>" class="btn btn-danger btn-sm text-center m-auto">
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