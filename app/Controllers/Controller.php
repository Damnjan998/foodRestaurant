<?php

	namespace app\Controllers;

	class Controller {

		protected function view($fileName, $data = []) {


			extract($data);

			include "app/views/fixed/head.php";
			include "app/views/fixed/navbar.php";
			include "app/views/pages/$fileName.php";
			include "app/views/fixed/footer.php";
		}

		protected function redirect($page) {
			header("Location:" . $page);
		}
	}