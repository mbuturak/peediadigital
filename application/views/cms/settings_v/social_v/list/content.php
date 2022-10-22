<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6  d-flex justify-content-start">
                <h3>Sosyal Medya</h3>
            </div>
            <div class="col-12 col-md-6  d-flex justify-content-end">
                <a href="<?php echo base_url('cms/new-social') ?>"><button class="btn btn-success btn-sm"><i class="bi bi-plus-circle-dotted" style="vertical-align: middle; margin-right:5px"></i> Yeni Ekle</button></a>
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
                            <th width="8%">Başlık</th>
                            <th width="15%">Url</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($item as $social) {
                            $count++; ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $social->title ?></td>
                                <td><a href="<?php echo $social->url ?>" target="_blank"><?php echo substr($social->url, 0, 50) . '..' ?></a></td>
                                <td>
                                    <a href="<?php echo base_url('cms/edit-social/' . $social->Id) ?>" class="btn btn-primary btn-sm text-center m-auto">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('cms/remove-social/' . $social->Id) ?>" class="btn btn-danger btn-sm text-center m-auto">
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