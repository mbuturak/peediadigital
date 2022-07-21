<?php $alert = $this->session->userdata("alert");
if (isset($alert) && $alert["type"] == "success") { ?>
    <script>
        Toastify({
            text: "<?php echo $alert["text"] ?>",
            duration: 1500,
            close: false,
            gravity: "top",
            position: "right",
            backgroundColor: "#2FAF4E",
        }).showToast();
    </script>
<?php } else { ?>
    <script>
        Toastify({
            text: "<?php echo $alert["text"] ?>",
            duration: 1500,
            close: false,
            gravity: "top",
            position: "right",
            backgroundColor: "#FF5733",
        }).showToast();
    </script>
<?php } ?>