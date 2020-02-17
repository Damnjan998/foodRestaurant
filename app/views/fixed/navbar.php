<body>
<section id="home">
    <div class="main-top py-1" style="background: 	#e5cb7a;">
        <div class="container">
            <div class="nav-content">
                <h1>
                    <a id="logo" class="logo" href="index.php">
                        <img src="app/assets/images/logo.png" alt="" class="img-fluid"><span>Tasty</span> Burger
                    </a>
                </h1>
                <div class="nav_web-dealingsls">
                    <nav>
                        <ul class="menu">
							<?php
								global $navController;

								$rezultatNav = $navController->nav();
								foreach ($rezultatNav as $r) {
									echo "<li><a href='index.php?page=$r->href'>$r->naziv</a></li>";
								}
								if (isset($_GET['page'])) {
									$strana = $_GET['page'];
									if ($strana == 'home') {
										echo "<li><a href='#services'>Services</a></li>";
									}
								} else {
									echo "<li><a href='#services'>Services</a></li>";
								}
								if (isset($_SESSION['korisnik'])) {
									echo "<li><a href='index.php?page=logout'>Log out</a></li>";

									if ($_SESSION['korisnik']->id_uloga == 2) {
										echo "<li><a href='index.php?page=admin'>Admin Panel</a></li>";
									}

								} else {
									echo "<li><a href='index.php?page=logovanje'>Login</a></li>";
									echo "<li><a href='index.php?page=registration'>Register</a></li>";
								}
							?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>