<?php include "../config/config.php"; ?>
<?php include "layout/header.php"; ?>

<?php if( ($cur_page != 'login.php') && ($cur_page != 'forget-password.php') && ($cur_page != 'reset-password.php')): ?>
<?php include "layout/top.php"; ?>
<?php include "layout/sidebar.php"; ?>
<?php endif; ?>