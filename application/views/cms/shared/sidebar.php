<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo base_url('cms'); ?>"><img src="<?php echo base_url('assets/cms/images/logo/logo.png'); ?>" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms'); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Hoşgeldiniz</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/hero-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-house"></i>
                        <span>Karşılama Ekranı</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/about-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-file-person"></i>
                        <span>Hakkımızda</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/services-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-list-ul"></i>
                        <span>Servisler</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/portfolio-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-kanban"></i>
                        <span>Portfolyo</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/newsletter-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-person-square"></i>
                        <span>Abonelik Yönetimi</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Genel Ayarlar</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('cms/contact-management'); ?>">İletişim</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('cms/seo-management'); ?>">SEO</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('cms/social-management'); ?>">Sosyal Medya</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/user-management'); ?>" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Kullanıcılar</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms/logout'); ?>" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Güvenli Çıkış</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>