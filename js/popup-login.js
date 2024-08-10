// Get the popup
var popup = document.getElementById("loginPopup");

// Get the link that opens the popup
var loginLink = document.getElementById("login-link");

// Get the <span> element that closes the popup
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks on the login link, open the popup
loginLink.onclick = function () {
    popup.style.display = "block";
}

// When the user clicks on <span> (x), close the popup
closeBtn.onclick = function () {
    popup.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function (event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

// Conditionally show the logout link if the user is logged in
if (<?= json_encode(isset($data['nama_lengkap'])) ?>) {
    document.getElementById("logout-link").style.display = "block";
}
