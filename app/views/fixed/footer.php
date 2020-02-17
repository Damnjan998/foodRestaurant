<!-- footer -->
<footer class="py-5">
    <div class="container py-xl-4">
        <div class="row footer-top">
            <div class="col-lg-4 footer-grid_section_1its footer-text">
                <!-- logo -->
                <h2>
                    <a class="logo text-wh" href="index.html">
                        <img src="app/assets/images/logo.png" alt="" class="img-fluid"><span>Tasty</span> Burger
                    </a>
                </h2>
                <!-- //logo -->
                <p class="mt-lg-4 mt-3 mb-lg-5 mb-4">Sed ut perspiciatis unde omnis iste natus errorhjhsit lupt
                    atem
                    accursit lupt atem accu
                    dfdsa
                    ntium doloremque laudan tium accu santium dolore.</p>
                <!-- social icons -->
                <ul class="top-right-info">
                    <li>
                        <p>Follow As:</p>
                    </li>
                    <li class="facebook-w3">
                        <a href="#facebbok">
                            <span class="fa fa-facebook-f"></span>
                        </a>
                    </li>
                    <li class="twitter-w3">
                        <a href="#twitter">
                            <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                    <li class="google-w3">
                        <a href="#google">
                            <span class="fa fa-google-plus"></span>
                        </a>
                    </li>
                </ul>
                <!-- //social icons -->
            </div>
            <div class="col-lg-4 footer-grid_section_1its my-lg-0 my-sm-4 my-4">
                <div class="footer-title">
                    <h3>Contact Us</h3>
                </div>
                <div class="footer-text mt-4">
                    <p>Address : 1234 lock, Charlotte, North Carolina, United States</p>
                    <p class="my-2">Phone : +12 534894364</p>
                    <p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
                </div>
            </div>
            <div class="col-lg-4 footer-grid_section_1its">
                <div class="footer-title">
                    <h3>Informations</h3>
                </div>
                <div class="info-form-right mt-4 p-0">
                    <ul id="informacija">
						<?php
							global $pageController;

							$rezultatInfo = $pageController->getInformation();

							foreach ($rezultatInfo as $ri) {
								echo "<li><a class='informacijaClass' href='$ri->putanja' target='_blank'>$ri->naziv</a></li><br/>";
							}
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="#home" class="move-top text-center">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </a>
</footer>
<!-- //footer -->
</body>

</html>