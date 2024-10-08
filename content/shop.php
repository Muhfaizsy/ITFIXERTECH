<?php
$queryProduk = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC LIMIT 8");

$id_membership = isset($_SESSION['id_membership']) ? $_SESSION['id_membership'] : '';
$query = mysqli_query($koneksi, "SELECT * FROM `membership`");
$data = mysqli_fetch_assoc($query);

if (!empty($_SESSION['cart'])) {
    $cart_count = count($_SESSION['cart']);
}
?>

<div align="right" class="mb-2">
    <a class="btn btn-outline-dark m-5" href="?pg=cart">
        <i class="bi-cart-fill me-1"></i>Cart<span class="badge bg-dark text-white ms-1 rounded-pill"><?= isset($cart_count) ? $cart_count : '' ?></span></a>
</div>

<section class="py-1">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php while ($rowProduk = mysqli_fetch_assoc($queryProduk)) : ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img src="admin/upload/<?= htmlspecialchars($rowProduk['foto']) ?>" class="img-fluid product-thumbnail">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">
                                    <h3 class="product-title"><?= htmlspecialchars($rowProduk['nama_barang']) ?></h3>
                                </h5>
                                <!-- Product price-->
                                <?= "Rp. " . number_format($rowProduk['harga']) ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form action="?pg=action-cart" method="POST">
                                    <input type="hidden" name="id_produk" value="<?= htmlspecialchars($rowProduk['id']) ?>">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>