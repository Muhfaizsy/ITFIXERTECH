<?php
// session_start();
unset($_SESSION['nama_lengkap']);
unset($_SESSION['email']);
unset($_SESSION['id_member']);
// session_destroy();
header("location:index.php");
