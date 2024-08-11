<?php
if (!isset($_SESSION['id_membership'])) {
    header("location:?pg=member&message=Upss-Harus-Register-Dulu");
    exit();
}

$subtotal = 0;

// Kalkulasi subtotal
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['harga'] * $item['qty'];
    }
}

$pajak = $subtotal * 0.05;  // Pajak 5%
$total = $subtotal + $pajak;  // Total dengan pajak

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:60%">Product</th>
                            <th style="width:12%">Price</th>
                            <th style="width:10%">Quantity</th>
                            <th style="width:16%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($_SESSION['cart'])): ?>
                            <?php foreach ($_SESSION['cart'] as $item) :
                                // Hitung subtotal untuk setiap item
                                $total_harga_item = $item['harga'] * $item['qty'];
                                $subtotal += $total_harga_item; // Tambahkan ke subtotal
                            ?>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <img src="admin/upload/<?php echo htmlspecialchars($item['foto']); ?>" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                            </div>
                                            <div class="col-md-9 text-left mt-sm-2">
                                                <h4><?= htmlspecialchars($item['nama_produk']); ?></h4>
                                                <p class="font-weight-light"><?= htmlspecialchars($item['nama_produk']); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price"><?= "Rp. " . number_format($total_harga_item); ?></td>
                                    <td data-th="Quantity">
                                        <input type="number" class="form-control form-control-lg text-center" value="<?= $item['qty'] ?>" min="1">
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="text-right">
                                            <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                <i class="bi bi-recycle"></i>
                                            </button>
                                            <a href="?pg=action-cart&delete-cart=<?= $item['id_produk'] ?>">
                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Keranjang belanja Anda kosong.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="float-right text-right">
                    <h4>Total Barang :</h4>
                    <h1><?= "Rp. " . number_format($total); ?></h1>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <a href="#" class="btn btn-primary mb-4 btn-lg pl-5 pr-5" data-toggle="modal" data-target="#checkoutModal">Checkout</a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="checkoutModalLabel">Checkout Summary</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Content of Modal -->
                            <div class="checkout-details">
                                <h4>Items:</h4>
                                <?php foreach ($_SESSION['cart'] as $item) : ?>
                                    <div class="d-flex justify-content-between">
                                        <span><?= htmlspecialchars($item['nama_produk']); ?> x <?= $item['qty']; ?></span>
                                        <span><?= "Rp. " . number_format($item['harga'] * $item['qty']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <strong>Pajak (5%):</strong>
                                    <strong><?= "Rp. " . number_format($pajak); ?></strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong>Total:</strong>
                                    <strong><?= "Rp. " . number_format($total); ?></strong>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="#" class="btn btn-primary" id="checkoutButton">Confirm and Checkout</a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Terima Kasih!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="display-1 text-success">&#10004;</div>
                                        <p class="mt-3">Pembayaran telah diterima.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="?pg=shop">
                    <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('checkoutButton').addEventListener('click', function(event) {
        event.preventDefault();
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();
    });
</script>