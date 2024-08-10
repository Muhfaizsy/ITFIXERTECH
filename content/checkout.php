<?php
if (!isset($_SESSION['id_member'])) {
    header("location:?pg=member&message=Upss-Harus-Register-Dulu");
}
?>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .warning {
        border: 2px solid red !important
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }

    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }

    @media(max-width:400px) {
        .main.block {
            display: block !important
        }
    }
</style>

<body>
    <div class="min-h-screen flex justify-center items-center bg-gray-700">
        <div class="h-auto w-96 bg-white rounded-lg p-3 ">
            <div class="main ">
                <div class="relative mt-2">
                    <p class="text-xl font-semibold">Checkout</p>
                    <p class="text-sm text-pink-500 absolute top-1 left-24 font-semibold">#40950</p>
                    <p class="mt-1 text-pink-400 ">Diverse and rich experience,thye existing structure of the
                        organization contruibutes to the prepration.</p>
                    <hr class="mt-4">
                </div>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <div class="mt-4 flex justify-between">
                        <p class="text-pink-900 font-semibold"><?= $item['nama_produk'] ?></p>
                        <p class="text-pink-900 font-semibold" value="<?= $item['qty'] ?>"></p>
                        <p><?= "Rp. " . number_format($item['harga'] * $item['qty']); ?></p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <p class="text-pink-900 font-semibold">VAT(20%)</p>

                    </div>
                    <hr class="mt-4">
                    <div class="mt-4 flex justify-between">
                        <p class="text-pink-900 text-lg font-semibold">Total</p>
                        <p class="text-lg ">$81.60</p>
                    </div>
                <?php endforeach ?>
                <button
                    class="buy h-12 mb-8 w-full bg-gray-400 rounded-lg text-sm cursor-pointer text-white hover:bg-gray-600 transition-all mt-12">Buy
                    Now</button>
            </div>
            <div class="main hidden">
                <div class="relative mt-2">
                    <p class="text-xl text-center font-semibold">Billing Info</p>
                    <i class="back absolute top-2 text-gray-500 cursor-pointer fa fa-arrow-left"></i>
                </div>
                <div class="w-full mt-8 flex gap-2 ">
                    <div class="w-full relative">
                        <input
                            class="h-12 border-2 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                            type="text">
                        <span class="absolute -top-6 text-sm left-0">Nama Depan</span>
                    </div>
                    <div class="w-full relative">
                        <input
                            class=" h-12 border-2 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                            type="number" require>
                        <span class="absolute -top-6 text-sm left-0">Nama Belakang</span>
                    </div>
                </div>
                <div class="w-full relative mt-9">
                    <input
                        class=" h-12 border-2 pr-16 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                        type="text">
                    <span class="absolute -top-6 text-sm left-0">Email</span>
                </div>
                <div class="w-full relative mt-9">
                    <input
                        class=" h-12 border-2 pr-16 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                        type="text" placeholder="0000 0000 0000 0000" data-slots="0" data-accept="\d" size="19" require>
                    <span class="absolute -top-6 text-sm left-0">Card Number</span>
                    <span class="h-10 w-10 absolute right-2 top-1 cursor-pointer"><img
                            src="https://imgur.com/5SjlNJf.jpg"></span>
                </div>
                <div class="w-full mt-9 flex gap-2 ">
                    <div class="w-full relative">
                        <input
                            class="h-12 border-2 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                            type="text" placeholder="mm/yyyy" data-slots="my" require>
                        <span class="absolute -top-6 text-sm left-0">Expiry Date</span>
                    </div>
                    <div class="w-full relative">
                        <input
                            class=" h-12 border-2 rounded-lg outline-none px-3 text-sm w-full focus:border-blue-500 transition-all"
                            type="text" placeholder="000" data-slots="0" data-accept="\d" size="3" require>
                        <span class="absolute -top-6 text-sm left-0">CVV</span>
                    </div>
                </div>
                <button
                    class="proceed h-12 mb-8 w-full bg-blue-400 rounded-lg text-sm cursor-pointer text-white hover:bg-blue-600 transition-all mt-12">Proceed
                    Payment</button>
            </div>
            <div class="main hidden">
                <div class="relative mt-2">
                    <p class="text-xl text-center text-green-400 font-semibold">Success<i
                            class="text-green-400 ml-1 fa fa-check"></i></p>
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                    <p class="text-center text-green-800 mt-4 font-semibold mb-10 ">Thanks for purchasing,your item has
                        been added to cart and will be delivered shortly,hope you felt good in dealing with us.</p>
                </div>

            </div>


        </div>

    </div>
</body>

<script>
    var buy = document.querySelector(".buy");
    var proceed = document.querySelector(".proceed");
    var back = document.querySelector(".back");
    var main_forms = document.querySelectorAll(".main");
    let formnumber = 0;

    buy.onclick = function() {
        formnumber++;
        updateform();
    }

    proceed.onclick = function() {
        if (!validateform()) {
            return false;
        }
        formnumber++;
        updateform();
    }

    back.onclick = function() {
        formnumber--;
        updateform();
    }

    function updateform() {
        main_forms.forEach(function(pages) {
            pages.classList.add('hidden');
            pages.classList.remove('block');
        });
        main_forms[formnumber].classList.remove('hidden');
        main_forms[formnumber].classList.add('block');
    }

    function validateform() {
        var validate = true;
        var inputs = document.querySelectorAll(".main.block input");
        inputs.forEach(function(e) {
            e.classList.remove('warning');
            if (e.hasAttribute("require")) {
                if (e.value.length == "0") {
                    validate = false;
                    e.classList.add('warning');
                }
            }
        });
        return validate;
    }



    document.addEventListener('DOMContentLoaded', () => {
        for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
            const pattern = el.getAttribute("placeholder"),
                slots = new Set(el.dataset.slots || "_"),
                prev = (j => Array.from(pattern, (c, i) => slots.has(c) ? j = i + 1 : j))(0),
                first = [...pattern].findIndex(c => slots.has(c)),
                accept = new RegExp(el.dataset.accept || "\\d", "g"),
                clean = input => {
                    input = input.match(accept) || [];
                    return Array.from(pattern, c =>
                        input[0] === c || slots.has(c) ? input.shift() || c : c
                    );
                },
                format = () => {
                    const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                        i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                        return i < 0 ? prev[prev.length - 1] : back ? prev[i - 1] || first : i;
                    });
                    el.value = clean(el.value).join``;
                    el.setSelectionRange(i, j);
                    back = false;
                };
            let back = false;
            el.addEventListener("keydown", (e) => back = e.key === "Backspace");
            el.addEventListener("input", format);
            el.addEventListener("focus", format);
            el.addEventListener("blur", () => el.value === pattern && (el.value = ""));
        }
    });
</script>