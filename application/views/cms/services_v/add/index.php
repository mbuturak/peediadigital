<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peedia Digital | CMS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <?php $this->load->view($mainFolder . '/shared/css'); ?>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <!-- Sidebar -->
        <?php $this->load->view($mainFolder . '/shared/sidebar'); ?>

        <div id="main">

            <!-- Content -->
            <?php $this->load->view($mainFolder . '/' . $viewFolder . '/add/content') ?>

        </div>

    </div>

    <?php $this->load->view($mainFolder . '/shared/js'); ?>
</body>

</html>