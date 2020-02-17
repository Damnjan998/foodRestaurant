window.onload = function () {
    document.getElementById("btnLogin").addEventListener("click", login);
}

function login(e) {
    e.preventDefault();

    var emailLogin = document.getElementById("tbEmail");
    var passwordLogin = document.getElementById("tbPassword");

    var validan = validacijaLogin(emailLogin, passwordLogin);

    if (validan) {
        $.ajax({
            url: "index.php?page=login",
            method: "POST",
            data: {
                send: "send",
                email: emailLogin.value,
                lozinka: passwordLogin.value,
            },
            success: function (data, xhr) {
                alert("Successfully logged in.");
                window.location = 'index.php?page=home'
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        })
    } else {
        e.preventDefault();
    }
}

function validacijaLogin(emailLogin, passwordLogin) {

    var reEmailLogin = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/;
    var validan = true;

    if (!reEmailLogin.test(emailLogin.value)) {
        emailLogin.style.border = "3px solid red"
        validan = false;
    } else {
        emailLogin.style.border = "3px solid green"
    }
    if (!rePassword.test(passwordLogin.value)) {
        passwordLogin.style.border = "3px solid red"
        validan = false;
    } else {
        passwordLogin.style.border = "3px solid green"
    }

    return validan;
}

