function getCookieName() {
    return document.cookie.match(new RegExp(
        "(?:^|; )" + "userId".replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
}

function checkCookieOnPage(page, redirect) {

    let name = getCookieName();
    let isNull = name !== null;
    if (isNull != redirect) {
        window.location.href = "/" + page + ".php";
    }
}



