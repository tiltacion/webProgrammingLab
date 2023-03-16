function checkCookieOnLoginPage() {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + "userId".replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));

    if (matches !== null) {
        window.location.href = "/schedule.php";
    }
}

function checkCookieOnSchedulePage() {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + "userId".replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));

    if (matches == null) {
        window.location.href = "/login.php";
    }
}
