<?php
// include 'admin/function/get_data.php';

$id_member = isset($_SESSION['id_member']) ? $_SESSION['id_member'] : '';
$query = mysqli_query($koneksi, "SELECT * FROM `member`");
$data = mysqli_fetch_assoc($query);

if (!empty($_SESSION['cart'])) {
    $cart_count = count($_SESSION['cart']);
}

if (isset($_POST['simpan'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT *  FROM member WHERE member.email = '$email'");
    if (mysqli_num_rows($query) > 0) {
        $dataUser = mysqli_fetch_assoc($query);
        if ($dataUser['password'] == $password) {
            $_SESSION['id_member'] = $dataUser['id'];
            $_SESSION['id_session'] = session_id();

            header('location: index.php');
        }
    }
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

    /* Dark mode styling */
    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    .switch.dark-mode {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch.dark-mode input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider.dark-mode {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #444;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider.dark-mode:before {
        background-image: url(img/whatsapp-icon-free-png.webp);
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider.dark-mode {
        background-color: #2196F3;
    }

    input:focus+.slider.dark-mode {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider.dark-mode:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round.dark-mode {
        border-radius: 34px;
    }

    .slider.round.dark-mode:before {
        border-radius: 50%;
    }

    /* Optional: Transition for the body background */
    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    /* BATASAN */
    /* The popup container */
    .popup {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Popup content */
    .popup-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
    }

    /* Close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
                <!-- Trigger button (replace with your actual trigger element if needed) -->
                <li class="dropdown">
                    <a href="#" id="login-link"><i class="bi bi-person-circle"> </i><?= isset($data['nama_lengkap']) ? $data['nama_lengkap'] : '' ?></a>
                </li>

                <!-- Modal Popup -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if (isset($_SESSION['id_member'])) : ?>
                                    <p>Selamat Datang di Website ITFIXERTECH</p>
                                    <p>Nama : <?php echo htmlspecialchars($data['nama_lengkap']); ?></p>
                                    <p>Email : <?php echo htmlspecialchars($data['email']); ?></p>
                                    <p>Alamat : <?php echo htmlspecialchars($data['alamat']); ?></p>
                                    <center><a href="?pg=logout" class="btn btn-danger">Logout</a></center>
                                <?php else : ?>
                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" required>
                                        </div>
                                        <button name="simpan" type="submit" class="btn btn-primary">Login</button>
                                        <a href="?pg=member" class="d-block mt-2">Register</a>
                                    </form>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <li>
                    <label class="switch dark-mode">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="slider round dark-mode"></span>
                    </label>
                </li> -->

            </ul>
        </div>
    </div>
</div>

<script>
    document.getElementById('login-link').addEventListener('click', function() {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
</script>
<!-- <script>
    document.getElementById('darkModeToggle').addEventListener('change', function() {
        document.body.classList.toggle('dark-mode', this.checked);
    });
</script> -->