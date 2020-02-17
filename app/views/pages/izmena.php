<?php
	if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
		header("location: index.php?page=home");
	}
	echo "<div id=\"okvirUpdateProduct\">
	<h1 id=\"glavniNaslov\">UPDATE PRODUCT</h1>";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		global $menuController;

		$rezultat = $menuController->getOneProduct($id);

		echo "<form action = 'index.php?page=izmenaProizvoda&id=$id' method='POST' enctype='multipart/form-data'>
    <table id='insertTabela'>
    <tr>
        <td>Name</td>
        <td><input type='text' pattern='^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$' required title='Example: Herald' value='$rezultat->naziv' name='naziv'></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><input type='text' title='Product description'  name='opis' value='$rezultat->opis'></td>
    </tr>
    <tr>
        <td>Special</td>
        <td><input type='text' pattern='^[01]$' title='Example: 0 or 1' required name='istaknut' value='$rezultat->istaknut'></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><input type='file' name='slika'/></td>
    </tr>
    <tr>
        <td colspan='2'><button class='submit-btn' type='submit' id='btnIzmena' name='izmeni'>Update</button></td>
    </tr>
    </table>
    </form>
    </div>";
	}
?>

