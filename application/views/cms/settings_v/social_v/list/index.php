<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view($mainFolder . '/shared/head'); ?>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php $this->load->view($mainFolder . '/shared/sidebar'); ?>

        <div id="main">
            <!-- Content -->
            <?php $this->load->view($mainFolder . '/' . $viewFolder . '/' . $folderName .'/list/content') ?>

        </div>

    </div>

    <?php $this->load->view($mainFolder . '/shared/js'); ?>
</body>

</html>