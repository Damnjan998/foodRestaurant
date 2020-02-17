$(document).ready(function () {
    loadMenu();
    let proizvodi;
    strana = 0;

    function prikazProizvoda() {
        ispis = "";

        for (let proizvod of proizvodi) {
            ispis += ispisProizvoda(proizvod);
        }
        document.getElementById("proizvodiMeni").innerHTML = ispis;
    }

    function ispisProizvoda(proizvod) {
        return `<div class="col-md-4 mt-md-0 mt-4">
                    <div class="gallery-demo">
                            <img src="${proizvod.slika}" alt="${proizvod.alt}" class="img-fluid" />
                            <h4 class="p-mask">${proizvod.naziv}</h4>
                    </div>
                </div>`
    }

    document.getElementById("selectProductSort").addEventListener("change", getMenu);
    document.getElementById("poljePretraga").addEventListener("keyup", getMenu);
    $(document).on('click', '.pag', function () {
        strana = this.dataset.id - 1;
        console.log(strana);
        getMenu();
    });


    function prikazPaginacija(broj) {
        paginacija = broj.brojProizvoda;
        brojPoStrani = 6;
        ukupno = Math.ceil(paginacija / brojPoStrani);
        ispis = "";

        for (let i = 1; i <= ukupno; i++) {
            ispis += "<li><a class='pag' data-id='" + i + "'>" + i + "</a></li>";
        }
        document.getElementById("stilPaginacija").innerHTML = ispis;
    }

    function getMenu() {
        ddlSort = document.getElementById("selectProductSort");
        sortiraj = ddlSort.options[ddlSort.selectedIndex].value;
        poljePretraga = document.getElementById("poljePretraga").value;

        $.ajax({
            url: "index.php?page=sort&sortiraj=" + sortiraj + "&pretraga=" + poljePretraga + "&strana=" + strana,
            method: "GET",
            dataType: "json",
            success: function (data) {
                proizvodi = data;
                prikazProizvoda();
                getPaginacija(poljePretraga);
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        })
    }

    function loadMenu() {
        $.ajax({
            url: "index.php?page=sort",
            method: "GET",
            dataType: "json",
            success: function (data) {
                proizvodi = data;
                prikazProizvoda();
                getPaginacija("");
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        });
    }

    function getPaginacija(filter) {
        $.ajax({
            url: "index.php?page=paginacija&pretraga=" + filter,
            method: "GET",
            dataType: "json",
            success: function (data) {
                prikazPaginacija(data);
            },
            error: function (data) {
                console.log("Error: " + data.status);
                alert(data.responseText);
            }
        })
    }
});