<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peedia Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/cms') ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/cms') ?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/cms') ?>/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/cms') ?>/css/pages/auth.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.png" type="image/x-icon">
    <meta name="robots" content="noindex">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="<?php echo base_url('cms') ?>"><img src="<?php echo base_url('assets/cms/images/logo/logo.png') ?>" alt="Logo"></a>
                    </div>
                    <form action="<?php echo base_url('DashboardUser/login') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view($mainFolder . '/shared/js'); ?>
</body>

</html>