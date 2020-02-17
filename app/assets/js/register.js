window.onload = function () {
    document.getElementById("btnRegister").addEventListener("click", registracija);
}

function registracija(e) {
    e.preventDefault();

    var nameRegistracija = document.getElementById("tbIme");
    var prezimeRegistracija = document.getElementById("tbPrezime")
    var mailRegistracija = document.getElementById("tbEmail");
    var lozinkaRegistracija = document.getElementById("tbPassword");
    var confirmLozinkaRegistracija = document.getElementById("tbConfirmPassword");

    var validan = validacijaRegistracije(nameRegistracija, prezimeRegistracija, mailRegistracija, lozinkaRegistracija, confirmLozinkaRegistracija);

    if (validan) {
        $.ajax({
            url: "index.php?page=register",
            method: "POST",
            data: {
                send: "send",
                firstName: nameRegistracija.value,
                lastName: prezimeRegistracija.value,
                email: mailRegistracija.value,
                password: lozinkaRegistracija.value,
                confirmPassword: confirmLozinkaRegistracija.value,
            },
            success: function () {
                alert("Successfuly registred!");
                window.location = 'index.php?page=home';
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        });
    }
}

function validacijaRegistracije(nameRegistracija, prezimeRegistracija, mailRegistracija, lozinkaRegistracija, confirmLozinkaRegistracija) {

    var reName = /^[A-Z][a-z]{1,11}$/;
    var reEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    var rePrezime = /^[A-Z][a-z]{1,11}$/;
    var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/;
    var validan = true;

    if (!reName.test(nameRegistracija.value)) {
        nameRegistracija.style.border = "3px solid red"
        document.getElementById("greskaName").style.visibility = "visible";
        validan = false;
    } else {
        nameRegistracija.style.border = "3px solid green"
    }

    if (!rePrezime.test(prezimeRegistracija.value)) {
        prezimeRegistracija.style.border = "3px solid red"
        document.getElementById("greskaPrezime").style.visibility = "visible";
        validan = false;
    } else {
        prezimeRegistracija.style.border = "3px solid green"
    }

    if (!reEmail.test(mailRegistracija.value)) {
        mailRegistracija.style.border = "3px solid red"
        document.getElementById("greskaMail").style.visibility = "visible";
        validan = false;
    } else {
        mailRegistracija.style.border = "3px solid green"
    }

    if (!rePassword.test(lozinkaRegistracija.value)) {
        lozinkaRegistracija.style.border = "3px solid red"
        document.getElementById("greskaSifra").style.visibility = "visible";
        validan = false;
    } else {
        lozinkaRegistracija.style.border = "3px solid green"
    }

    if (lozinkaRegistracija.value != confirmLozinkaRegistracija.value) {
        confirmLozinkaRegistracija.style.border = "3px solid red"
        document.getElementById("greskaSifra").style.visibility = "visible";
        validan = false;
    } else {
        confirmLozinkaRegistracija.style.border = "3px solid green"
    }

    return validan;
}