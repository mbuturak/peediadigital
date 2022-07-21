            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Yeni Servis Ekle</h3>
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
                                                <form class="form" action="<?php echo base_url('DashboardServices/add') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">Icon</h5>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <input type="file" class="form-control" name="icon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">Açıklama Görsel</h5>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <input type="file" class="form-control" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="title-column">Başlık</label>
                                                                <input type="text" id="title-column" class="form-control" placeholder="Başlık" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="description-column">Açıklama</label>
                                                                <textarea type="text" id="description-column" class="form-control" placeholder="Açıklama" name="description" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Ekle</button>
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