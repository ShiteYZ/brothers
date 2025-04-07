<!---------SCRIPT FOR SWEETYALERT-------------->
<script type="text/javascript" src="assets/js/sweetalert.js"></script>
<?php
    if(isset($_SESSION['popup'])&& $_SESSION['popup'] !='' )
    {
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['popup']; ?>",
                    icon: "<?php echo $_SESSION['popup_code']; ?>",
                    button: "Ok",
                });
        <?php
        unset($_SESSION['popup']);
    }
?>

</script>