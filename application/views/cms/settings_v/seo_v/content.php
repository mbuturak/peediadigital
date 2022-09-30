            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>SEO Ayarları</h3>
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
                                                <form class="form" action="<?php echo base_url('DashboardSettings/update') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="title-column">Başlık</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Başlık" name="title" value="<?php echo $item[0]->title ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="title-column">Anahtar Kelimeler</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Anahtar Kelimeler" name="keywords" value="<?php echo $item[0]->keywords ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="title-column">Telefon</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Başlık" name="phone" value="<?php echo $item[0]->phone ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="title-column">Adres</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Anahtar Kelimeler" name="adress" value="<?php echo $item[0]->adress ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="title-column">Harita Link</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Anahtar Kelimeler" name="maps_link" value="<?php echo $item[0]->maps_link ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="description-column">Açıklama</label>
                                                                <textarea type="text" id="description-column" class="form-control" placeholder="Açıklama" name="description" rows="5"><?php echo $item[0]->description ?></textarea>
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