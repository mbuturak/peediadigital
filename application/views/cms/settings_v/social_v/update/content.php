            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Sosyal Medya Ekle</h3>
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

                                                <form class="form" action="<?php echo base_url('DashboardSocial/update/') . $item->Id ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="title-column">Başlık</label>
                                                                <input type="text" id="title-column" class="form-control" name="title" value="<?php echo $item->title ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="title-column">Url</label>
                                                                <input type="text" id="title-column" class="form-control" name="url" value="<?php echo $item->url ?>">
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