<?php
session_start();
// print_r($_SESSION);
// die;
include 'admin/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="shop/css/styles.css">
    
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>ITFIXERTECH</title>
</head>

<body>
    <!-- Start Header/Navigation -->
    <?php include 'inc/nav.php' ?>
    <!-- End Header/Navigation -->
    <?php
    if (isset($_GET['pg'])) {
        if (file_exists('content/' . $_GET['pg'] . '.php')) {
            include 'content/' . $_GET['pg'] . '.php';
        }
    } else {
        include 'content/home.php';
    }
    ?>
    <!-- Start Footer Section -->
    <?php include 'inc/footer.php' ?>
    <!-- End Footer Section -->

    <script src="script.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>