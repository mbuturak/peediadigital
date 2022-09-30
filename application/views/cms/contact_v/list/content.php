<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6  d-flex justify-content-start">
                <h3>Gelen Mesajlar</h3>
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
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($item as $contactItem) {
                            $count++; ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $contactItem->name ?></td>
                                <td><?php echo $contactItem->email ?></td>
                                <td><?php echo $contactItem->subject ?></td>
                                <td><?php echo substr($contactItem->message, 0, 185) . '...' ?></td>
                                <td><?php echo $contactItem->isCreatedAt ?></td>
                                <td><?php $isAcitve = convertisActiveWithBadge($contactItem->status);
                                    echo $isAcitve ?></td>
                                <td>
                                    <a href="<?php echo base_url('cms/edit-message/' . $contactItem->Id) ?>" class="btn btn-primary btn-sm text-center m-auto">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('cms/remove-message/' . $contactItem->Id) ?>" class="btn btn-danger btn-sm text-center m-auto">
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