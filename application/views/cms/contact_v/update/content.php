<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3><?php echo $item->name ?> kişisinin mesajı görüntülenmektedir.</h3>
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
                                    <form class="form" action="<?php echo base_url('DashboardContact/update/' . $item->Id) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title-column">İsim</label>
                                                    <input type="text" id="title-column" class="form-control" disabled name="name" value="<?php echo $item->name ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title-column">Email</label>
                                                    <input type="text" id="title-column" class="form-control" disabled name="email" value="<?php echo $item->email ?>">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description-column">Tarih</label>
                                                    <input type="text" id="title-column" class="form-control" disabled name="isCreatedAt" value="<?php echo $item->isCreatedAt ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description-column">İleti Durumu</label>
                                                    <br>
                                                    <?php echo convertisActiveWithBadge($item->status); ?>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description-column">Mesaj</label>
                                                    <textarea type="text" id="description-column" class="form-control" name="message" disabled rows="5"><?php echo $item->message ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description-column">Yanıt</label>
                                                    <textarea type="text" id="description-column" class="form-control" placeholder="Yanıtınızı buraya giriniz." name="reply" rows="5"><?php echo (isset($item->reply)) ? $item->reply : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between">
                                                <a href="<?php echo base_url('cms/remove-message/' . $item->Id) ?>" class="btn btn-danger me-1 mb-1">Mesajı Sil</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Mesajı İlet</button>
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