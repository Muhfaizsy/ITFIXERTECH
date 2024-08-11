<?php
// Jika ada produk yang dihapus dari keranjang
if (isset($_GET['delete-cart'])) {
    $id_produk = $_GET['delete-cart'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_produk'] == $id_produk) {
            unset($_SESSION['cart'][$key]);
            // Mengatur ulang array session setelah penghapusan
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header("location:?pg=cart");
            exit(); // Menghentikan skrip setelah redirect
        }
    }
} else {

    // Memeriksa apakah keranjang belanja sudah ada di session, jika belum, buat baru
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Memeriksa apakah pengguna sudah login sebagai member
    if (!isset($_SESSION['id_membership'])) {
        header("location:?pg=member&message=Upss-Harus-Register-Dulu");
        exit(); // Menghentikan skrip setelah redirect
    } else {
        // Memastikan ID produk tersedia di POST
        if (!isset($_POST['id_produk']) || empty($_POST['id_produk'])) {
            die("ID produk tidak tersedia atau kosong.");
        }

        $id_produk = $_POST['id_produk'];

        // Mengambil detail produk dari database
        $queryCart = mysqli_query($koneksi, "SELECT * FROM barang WHERE id ='$id_produk'");

        // Periksa apakah query berhasil
        if (!$queryCart) {
            die("Query gagal: " . mysqli_error($koneksi));
        }

        // Ambil data produk
        $rowBarang = mysqli_fetch_assoc($queryCart);

        // Jika produk ditemukan, tambahkan atau perbarui dalam keranjang
        if ($rowBarang) {
            $session_produk = array(
                'id_produk' => $id_produk,
                'nama_produk' => $rowBarang['nama_barang'],
                'qty'       => 1,
                'harga'     => $rowBarang['harga'],
                'foto'      => $rowBarang['foto']
            );

            $product_exists = false;
            // Periksa apakah produk sudah ada di keranjang
            foreach ($_SESSION['cart'] as $key => &$item) {
                if ($item['id_produk'] == $id_produk) {
                    // Jika produk sudah ada, tambahkan quantity-nya
                    $item['qty'] += 1;
                    $product_exists = true;
                    break;
                }
            }

            // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            if (!$product_exists) {
                $_SESSION['cart'][] = $session_produk;
            }
            header("location:index.php?tambah=cart-berhasil");
            exit(); // Menghentikan skrip setelah redirect
        } else {
            // Jika produk tidak ditemukan, beri pesan error atau lakukan tindakan lain
            echo "Produk tidak ditemukan.";
        }
    }
}
