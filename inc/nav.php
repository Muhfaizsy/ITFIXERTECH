<?php
// include 'admin/function/get_data.php';

$id_member = isset($_SESSION['id_member']) ? $_SESSION['id_member'] : '';
$query = mysqli_query($koneksi, "SELECT * FROM `member`");
$data = mysqli_fetch_assoc($query);

if (!empty($_SESSION['cart'])) {
    $cart_count = count($_SESSION['cart']);
}
// $member = getData($koneksi, $id_member);
// print_r($data);
// die;
?>
<style>
    .background-nav {
        background: #ffffff;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        width: 90%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-brand a {
        font-size: 24px;
        color: #000000;
        text-decoration: none;
        font-weight: 700;
    }

    .nav-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
    }

    .s {
        max-width: 1200px;
        margin: 0 auto;
        width: 90%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-menu ul li a {
        color: #000000;
        text-decoration: none;
        font-weight: 500;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background 0.3s, color 0.3s;
    }

    .nav-menu ul li a:hover {
        background: #000000;
        color: #ffffff;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #ffffff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: 100%;
        left: 0;
    }

    .dropdown-content a {
        color: #000000;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-weight: 500;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<div class="background-nav">
    <div class="s">
        <div class="nav-brand">
            <a href="?pg=home">
                <img src="img/itfixertech.png" alt="logo" width="200"></a>
        </div>
        <div class="nav-menu">
            <ul>
                <li class="dropdown">
                    <a href="#">JASA SERVICE <i class="bi bi-caret-down-fill"></i></a>
                    <div class="dropdown-content">
                        <a href="?pg=service-laptop">JASA SERVICE LAPTOP</a>
                        <a href="?pg=service-komputer">JASA SERVICE KOMPUTER</a>
                    </div>
                <li>
                    <a href="?pg=shop">SHOP</a>
                </li>
                <li class="dropdown"><a href="?pg=login-member"><i class="bi bi-person-circle"> </i><?= isset($data['nama_lengkap']) ? $data['nama_lengkap'] : '' ?></a>
                    <div class="dropdown-content">
                        <a href="?pg=logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>