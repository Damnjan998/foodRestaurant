<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "Home";
	}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Tasty Burger Restaurants | <?= strtoupper($page) ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8"/>
    <meta name="author" content="Askovic Damnjan 174.17"/>
    <meta name="language" content="English"/>
    <meta name="keywords"
          content="Tasty Burger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->
    <script type="text/javascript" src="app/assets/js/jquery.min.js"></script>
    <!-- Custom-Files -->
	<?php
		if (isset($_GET['page'])) {
			$page = $_GET['page'];

			if ($page == 'menu') {
				echo "<script src='app/assets/js/menu.js' type='text/javascript'></script>";
			} else if ($page == 'logovanje') {
				echo "<script src='app/assets/js/login.js' type='text/javascript'></script>";
			} else if ($page == 'registration') {
				echo "<script src='app/assets/js/register.js' type='text/javascript'></script>";
			} else if ($page == 'contact') {
				echo "<script src='app/assets/js/contact.js' type='text/javascript'></script>";
			} else if ($page == 'reviews') {
				echo "<script src='app/assets/js/reviews.js' type='text/javascript'></script>";
			}
		}
	?>
    <link rel="stylesheet" href="app/assets/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link href="app/assets/css/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <!-- css slider -->
    <link rel="stylesheet" href="app/assets/css/style.css" type="text/css" media="all"/>
    <!-- Style-CSS -->
    <link href="app/assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link
            href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
            rel="stylesheet">
    <link
            href="//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <!-- //Web-Fonts -->
</head>
