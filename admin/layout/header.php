<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>uploads/favicon.png">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/css/spacing.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>dist-admin/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">

</head>
<?php 
$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],'/')+1);
?>
<body class="<?php if($cur_page == 'login.php' || $cur_page == 'forget-password.php') {echo 'body-login';}?>"> 