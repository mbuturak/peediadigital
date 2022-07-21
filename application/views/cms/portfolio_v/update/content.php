<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Portfolio Güncelleme</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="<?php echo base_url('DashboardPortfolio/update/' . $item->Id) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        <h5 class="card-title">Görsel</h5>
                                                        <img class="img-rounded" style="object-fit:cover;" width="15%" src="<?php echo ($item->image != null) ? base_url('assets/uploads/portfolio/' . $item->image) : base_url('assets/uploads/no-photo.png') ?>" alt="<?php echo $item->title ?>">
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <input type="file" class="form-control" name="image">
                                                            <input type="hidden" class="form-control" name="old_image" value="<?php echo ($item->image != null) ? $item->image : 'no-photo.png' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="title-column">Başlık</label>
                                                    <input type="text" id="title-column" class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description-column">Açıklama</label>
                                                    <textarea type="text" id="description-column" class="form-control" placeholder="Açıklama" name="description" rows="5"><?php echo $item->description ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>