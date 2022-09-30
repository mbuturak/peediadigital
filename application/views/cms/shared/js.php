<script src="<?php echo base_url(); ?>assets/cms/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/cms/js/bootstrap.bundle.min.js"></script>
<!-- toastify -->
<script src="<?php echo base_url() ?>assets/cms/vendors/toastify/toastify.js"></script>
<script src="<?php echo base_url() ?>assets/cms/vendors/simple-datatables/simple-datatables.js"></script>


<script src="<?php echo base_url() ?>assets/cms/js/main.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?php
if (isset($_SESSION['alert'])) {
    $this->load->view('cms/shared/alert');
}
?>