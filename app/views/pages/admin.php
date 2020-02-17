<?php
	if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
		header("location: index.php?page=home");
	}
?>
<div id="okvir">
    <h1 id="glavniNaslov">ADMIN PANEL</h1>
    <h3 class="nasloviAdmin">Products</h3>
    <table id="tabelaProizvodi">
        <tr>
            <th class="tabelaIdProizvoda">Id</th>
            <th class="tabelaNazivProizvoda">Name</th>
            <th class="tabelaIstaknutProizvoda">Special</th>
            <th class="tabelaOpisProizvoda">Description</th>
            <th class="taster">Update</th>
            <th class="taster">Delete</th>
        </tr>
		<?php
			global $adminController;
			$rezultatProizvodi = $adminController->products();

			foreach ($rezultatProizvodi as $rp) {
				echo "<tr>
                            <td class='tabelaIdProizvoda'>$rp->id</td>
                            <td class='tabelaNazivProizvoda'>$rp->naziv</td>
                            <td class='tabelaIstaknutProizvoda'>$rp->istaknut</td>
                            <td class='tabelaOpisProizvoda'>$rp->opis</td>
                            <td class='taster'><a href='index.php?page=izmena&id=$rp->id'><button class='submit-btn' type='submit' name='izmeni'>Update</button></a></td>
                            <td class='taster'><a href='index.php?page=izbrisiProizvod&id=$rp->id'><button class='submit-btn' type='submit' name='izbrisi'>Delete</button></a></td>
                    </tr>";
			}
		?>
    </table>
    <h3 class="nasloviAdmin">New Album</h3>
    <form action="index.php?page=insertProduct" name="formaDodaj" method="POST" enctype="multipart/form-data">
        <table id="insertTabela">
            <tr>
                <td>Name:</td>
                <td><input type="text" required pattern="^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$"
                           title="Example: Herald" id="tbNazivProizvoda" name="naziv"></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" required title="Some description" id="tbOpisProizvoda"
                           name="opis"></td>
            </tr>
            <tr>
                <td>Special:</td>
                <td><input type="text" required pattern="^[0-1]{1}$" title="0 OR 1" id="tbIstaknut" name="istaknut">
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" id="slika" required name="slika"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="submit-btn" id='btnIzmena' value="Insert" type="submit" name="unesi"></td>
            </tr>
        </table>
    </form>
    <h3 class="nasloviAdmin">Users</h3>
    <table id="tabelaKorisnici">
        <tr>
            <th class="tabelaIdKorisnika">Id</th>
            <th class="tabelaImeKorisnika">First Name</th>
            <th class="tabelaPrezimeKorisnika">Last Name</th>
            <th class="tabelaEmailKorisnika">Email</th>
            <th class="tabelaVremeKorisnika">Date Of Registration</th>
            <th class="taster">Delete</th>
        </tr>
        <?php
            $rezultatUsers = $adminController->user();

            foreach ($rezultatUsers as $rs) {
	            echo "<tr>
                            <td class='tabelaIdKorisnika'>$rs->id</td>
                            <td class='tabelaImeKorisnika'>$rs->ime</td>
                            <td class='tabelaPrezimeKorisnika'>$rs->prezime</td>
                            <td class='tabelaEmailKorisnika'>$rs->email</td>
                            <td class='tabelaVremeKorisnika'>$rs->datum_registracije</td>
                            <td class='taster'><a href='index.php?page=izbrisi&id=$rs->id'><button class='submit-btn' type='submit' name='izbrisiKorisnike'>Delete</button></a></td>
                    </tr>";
            }
        ?>
    </table>
    <h3 class="nasloviAdmin">Customers Comments</h3>
    <table id="tabelaKorisnici">
        <tr>
            <th class="tabelaIdKorisnika">Id</th>
            <th class="tabelaImeKorisnika">First Name</th>
            <th class="tabelaPrezimeKorisnika">Last Name</th>
            <th class="tabelaNaslovKomentara">Subject</th>
            <th class="tabelaPorukaKomentara">Message</th>
            <th class="taster">Delete</th>
        </tr>
        <?php
            $rezultatKomentar = $adminController->comments();

            foreach ($rezultatKomentar as $rk) {
                echo "<tr>
                        <td class='tabelaIdKorisnika'>$rk->id</td>
                        <td class='tabelaImeKorisnika'>$rk->ime</td>
                        <td class='tabelaPrezimeKorisnika'>$rk->prezime</td>
                        <td class='tabelaNaslovKomentara'>$rk->naslov</td>
                        <td class='tabelaPorukaKomentara'>$rk->poruka</td>
                        <td class='taster'><a href='index.php?page=izbrisiKomentar&id=$rk->id'><button class='submit-btn' type='submit' name='izbrisiKorisnike'>Delete</button></a></td>
                    </tr>";
            }
        ?>
    </table>
    <h3 class="nasloviAdmin">Active Users</h3>
    <table id="tabelaKorisnici">
        <tr>
            <th class="tabelaIdKorisnika">Id</th>
            <th class="tabelaImeKorisnika">First Name</th>
            <th class="tabelaPrezimeKorisnika">Last Name</th>
            <th class="tabelaEmailKorisnika">Email</th>
            <th class="tabelaUlogaKorisnika">Role</th>
        </tr>
        <?php
            $aktivniKorisnici = $adminController->activeUsers();

            foreach ($aktivniKorisnici as $ak) {
	            echo "<tr>
                        <td class='tabelaIdKorisnika'>$ak->id</td>
                        <td class='tabelaImeKorisnika'>$ak->ime</td>
                        <td class='tabelaPrezimeKorisnika'>$ak->prezime</td>
                        <td class='tabelaEmailKorisnika'>$ak->email</td>
                        <td class='tabelaUlogaKorisnika'>$ak->naziv</td>
                    </tr>";
            }
        ?>
    </table>
    <h3 class="nasloviAdmin">Latest Records</h3>
    <table id="tabelaAkcija">
        <tr>
            <th class="tabelaNazivAkcije">Action</th>
            <th class="tabelaDatumVreme">Date of Action</th>
            <th class="tabelaImeKorisnika">First Name</th>
            <th class="tabelaPrezimeKorisnika">Last Name</th>
        </tr>
        <?php
            $akcija = $adminController->getAllFromRecord();

            foreach ($akcija as $a) {
                echo "<tr>
                        <td class='tabelaNazivAkcije'>$a->akcija</td>
                        <td class='tabelaDatumVreme'>$a->datum_vreme</td>
                        <td class='tabelaImeKorisnika'>$a->ime</td>
                        <td class='tabelaPrezimeKorisnika'>$a->prezime</td>
                    </tr>";
            }
        ?>
    </table>
</div>
