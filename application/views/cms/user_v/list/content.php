<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6  d-flex justify-content-start">
                <h3>Kullanıcılar</h3>
            </div>
            <div class="col-12 col-md-6  d-flex justify-content-end">
                <a href="<?php echo base_url('cms/new-user') ?>"><button class="btn btn-success btn-sm"><i class="bi bi-plus-circle-dotted" style="vertical-align: middle; margin-right:5px"></i> Yeni Ekle</button></a>
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
                            <th width="8%">Kullanıcı Adı</th>
                            <th width="8%">Parola</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($item as $userItem) {
                            $count++; ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $userItem->username ?></td>
                                <td>●●●●●●●●●</td>
                                <td>
                                    <a href="<?php echo base_url('cms/edit-user/' . $userItem->Id) ?>" class="btn btn-primary btn-sm text-center m-auto">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if ($_SESSION['user']->Id != $userItem->Id) { ?>
                                        <a href="<?php echo base_url('cms/remove-user/' . $userItem->Id) ?>" class="btn btn-danger btn-sm text-center m-auto">
                                            <i class="bi bi-x-octagon"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>