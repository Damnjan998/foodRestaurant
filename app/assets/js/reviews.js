window.onload = function () {
    document.getElementById("btnComment").addEventListener("click", comment);
}

function comment(e) {
    e.preventDefault();

    var subjectComment = document.getElementById("tbSubject");
    var messageComment = document.getElementById("tbMessage");

    var validan = validacijaComment(subjectComment, messageComment);

    if (validan) {
        $.ajax({
            url: "index.php?page=comment",
            method: "POST",
            data: {
                send: "send",
                subject: subjectComment.value,
                message: messageComment.value
            },
            success: function () {
                alert("Your comment has been sent!");
                window.location = 'index.php?page=reviews';
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        })
    }
}

function validacijaComment(subjectComment, messageComment) {

    var reSubjectComment = /^[A-Z][a-z]{2,20}$/;

    var validan = true;

    if (!reSubjectComment.test(subjectComment.value)) {
        subjectComment.style.border = "3px solid red"
        document.getElementById("greskaSubject").style.visibility = "visible";
        validan = false;
    } else {
        subjectComment.style.border = "3px solid green";
    }

    if (messageComment.value === "" || messageComment.value == null) {
        messageComment.style.border = "3px solid red"
        document.getElementById("greskaMessage").style.visibility = "visible";
        validan = false;
    } else {
        messageComment.style.border = "3px solid green"
    }

    return validan;
}