<style>
    /*.hero {
        background-image: url('img/home.jpg');
        background-size: cover;
        background-position: center;
        padding: 4em 0;
        opacity: 0.5;
    }

    /*.hero h1 {
        font-size: 2em;
        color: white;
        text-align: center;
    }

    /*.hero p {
        font-size: 1.2em;
        color: white;
        text-align: center;
    }

    /*.hero button {
        background-color: #ffcc00;
        border: none;
        padding: 1em 2em;
        cursor: pointer;
        text-align: center;
    }*/
    .c-item {
        height: 480px;
    }

    .c-img {
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
    }

    .services {
        padding: 2em;
        text-align: center;
    }

    .services-p {
        padding: 2em;
        text-align: center;
    }

    .services h2 {
        font-size: 2em;
        margin-bottom: 1em;
        text-align: center;
    }

    .service-item {
        display: inline-block;
        width: 30%;
        margin: 1em;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .service-item img {
        width: 100%;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .service-item h3 {
        font-size: 1.2em;
        margin: 0.5em 0;
        text-align: center;
    }

    .service-item p {
        padding: 0 1em;
        font-size: 0.9em;
        text-align: center;
    }

    .service-item button {
        background-color: #ffcc00;
        border: none;
        padding: 1em;
        margin: 1em;
        cursor: pointer;
        border-radius: 4px;
    }
</style>

<!-- <section align="center" class="hero">
    <h1>ITFIXERTECH</h1>
    <p>melayani jasa service (reparasi) pada berbagai perangkat IT dan Smartphone anda dengan dukungan Tim Teknisi berpengalaman dan Professional.</p>
    <a href="?pg=form-booking" class="btn btn-primary">Segera Booking</a>
</section> -->

<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="img/20240229_192742.jpg" class="d-block w-100 c-img" alt="Slide 1">
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">Selamat Datang</p>
                <h1 class="display-1 fw-bolder text-capitalize">ITFIXERTECH</p></h1>
                <a href="https://api.whatsapp.com/send/?phone=6285156473764&text=Saya+mau+booking+service+laptop+komputer&type=phone_number&app_absent=0">
                    <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Segera Booking</button>
                </a>
            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="img/dsada.jpg" class="d-block w-100 c-img" alt="Slide 2">
            <div class="carousel-caption top-0 mt-4">
                <p class="text-uppercase fs-3 mt-5">Selamat Datang</p>
                <p class="display-1 fw-bolder text-capitalize">ITFIXERTECH</p>
                <a href="https://api.whatsapp.com/send/?phone=6285156473764&text=Saya+mau+booking+service+laptop+komputer&type=phone_number&app_absent=0">
                    <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Segera Booking</button>
                </a>

            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="img/service-komputer.jpg" class="d-block w-100 c-img" alt="Slide 3">
            <div class="carousel-caption top-0 mt-4">
                <p class="text-uppercase fs-3 mt-5">Selamat Datang</p>
                <p class="display-1 fw-bolder text-capitalize">ITFIXERTECH</p></p>
                <a href="https://api.whatsapp.com/send/?phone=6285156473764&text=Saya+mau+booking+service+laptop+komputer&type=phone_number&app_absent=0">
                    <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Segera Booking</button>
                </a>

            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="services">
    <h2>Layanan ITFixerTech</h2>
    <Center>
        <p>melayani jasa service (reparasi) pada berbagai perangkat IT dan Smartphone anda dengan dukungan Tim Teknisi berpengalaman dan Professional.</p>
    </Center>
    <div class="service-item">
        <img src="img/laptop.jpg" alt="Layanan Jasa Service Laptop">
        <h3>Layanan Jasa Service Laptop</h3>
        <p>My service melayani jasa service laptop semua merek dan type laptop panggilan untuk rumah dan kantor bisa dipanggil dan dikerjakan ditempat.</p>
        <a href="?pg=service-laptop">
            <button>Read More</button>
        </a>
    </div>
    <div class="service-item">
        <img src="img/service-komputer.jpg" alt="Layanan Jasa Service Komputer">
        <h3>Layanan Jasa Service Komputer</h3>
        <p>My service memberikan solusi terbaik dan mudah, layanan jasa service komputer panggilan ke rumah dan kantor ditangani tim teknisi professional dan handal.</p>
        <a href="?pg=service-komputer">
            <button>Read More</button>
        </a>
    </div>
    <div class="service-item">
        <img src="img/murah.jpg" alt="Layanan Jasa Service Printer">
        <h3>Mendapatkan Pelayanan dengan Harga Terjangkau</h3>
        <p>IT FIXER Tech melayani dengan Harga Terjangkau dengan jaminan 100% Perbaikan</p>
        <a href="?pg=jsl">
            <button>Read More</button>
        </a>
    </div>
</section>