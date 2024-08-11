<?php
if (!isset($_SESSION['id_membership'])) {
    header("location:?pg=member&message=Upss-Harus-Register-Dulu");
}
$subtotal = 0; // Inisialisasi subtotal
?>
<link rel="stylesheet" href="css/checkout.css">

<body>
    <div class="min-h-screen flex justify-center items-center bg-gray-700">
        <div class="h-auto w-96 bg-white rounded-lg p-3 ">
            <div class="main ">
                <div class="relative mt-2">
                    <p class="text-xl font-semibold">Pelanggan</p>
                    <p class="text-sm text-pink-500 absolute top-1 left-24 font-semibold"> #1</p>
                    <hr class="mt-4">
                </div>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <div class="mt-4 flex justify-between">
                        <p class="text-pink-900 font-semibold"><?= $item['nama_produk'] ?></p>
                        <p class="text-pink-900 font-semibold" value="<?= $item['qty'] ?>"></p>
                        <p><?= "Rp. " . number_format($item['harga'] * $item['qty']); ?></p>
                    </div>
                    <?php
                    // Menambahkan harga item ke subtotal
                    $subtotal += $item['harga'] * $item['qty'];
                    ?>
                <?php endforeach ?>
                <div class="mt-4 flex justify-between">
                    <p class="text-pink-900 font-semibold">VAT(20%)</p>
                    <p><?= "Rp. " . number_format($subtotal * 0.2); ?></p>
                </div>
                <hr class="mt-4">
                <div class="mt-4 flex justify-between">
                    <p class="text-pink-900 text-lg font-semibold">Total</p>
                    <?php
                    $total = $subtotal + ($subtotal * 0.2); // Menghitung total dengan VAT
                    ?>
                    <p class="text-lg "><?= "Rp. " . number_format($total); ?></p>
                </div>

                <button
                    class="buy h-12 mb-8 w-full bg-gray-400 rounded-lg text-sm cursor-pointer text-white hover:bg-gray-600 transition-all mt-12">Buy
                    Now</button>
            </div>
            <!-- Bagian Billing Info dan Success Message tetap sama seperti sebelumnya -->
        </div>
    </div>
</body>