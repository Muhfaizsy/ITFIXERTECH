<?php
if (isset($_GET['delete-cart'])) {
    $id_produk = $_GET['delete-cart'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_produk'] == $id_produk) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header("location:?pg=cart");
        }
    }
} else {

    // memeriksa barang ada atau tidak di dalam variable session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['id_member'])) {
        header("location:?pg=member&message=Upss-Harus-Register-Dulu");
    } else {
        $id_member = $_SESSION['id_member'];
        $id_produk = $_POST['id_produk'];
        $queryCart = mysqli_query($koneksi, "SELECT * FROM barang  WHERE id ='$id_produk'");
        $rowBarang = mysqli_fetch_assoc($queryCart);

        $session_produk = array(
            'id_produk' => $id_produk,
            'nama_produk' => $rowBarang['nama_barang'],
            'qty'       => 1,
            'harga'     => $rowBarang['harga'],
            'foto'      => $rowBarang['foto']
        );

        $product_exists = false;
        // periksa apakah produk sudah ada di keranjang
        foreach ($_SESSION['cart'] as $key =>  &$item) {
            if ($item['$id_produk'] == $id_produk) {
                // print_r($item['qty'] += 1);
                // die;
                $item['qty'] += 1;
                $product_exists = true;
                break;
            }
        }

        // jika nilai sessionnya kosong / keranjang belanjanya produknya kosong
        if (!$product_exists) {
            $_SESSION['cart'][] = $session_produk;
        }
        header("location:index.php?tambah=cart-berhasil");
    }
}
