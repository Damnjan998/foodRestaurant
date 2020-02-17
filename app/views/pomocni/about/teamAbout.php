<!-- team -->
<div class="team py-5" id="chefs">
    <div class="container-fluid py-xl-5 py-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <h3 class="w3ls-title mb-3">Our <span>Chefs</span></h3>
            <p class="titile-para-text mx-auto">They are making it simple!</p>
        </div>
        <div class="row team-bottom pt-4">
			<?php
				global $aboutController;
				$rezultatKuvar = $aboutController->chefs();
				$rezultatFollowIkonice = $aboutController->followIkonice();

				foreach ($rezultatKuvar as $rk) {
					echo "<div class=\"col-lg-3 col-6 team-grid\">
					<a href=\"#team\"><img src=\"app/assets/$rk->slika\" class=\"img-fluid\" alt=\"$rk->alt\"></a>
					<div class=\"caption\">
						<div class=\"team-text\">
							<h4><a href=\"#team\">$rk->ime $rk->prezime</a></h4>
						</div>
						<ul>";
					foreach ($rezultatFollowIkonice as $ri) {
						echo "<li>
								<a href='#'>
								<i class=\"$ri->klasa\" aria-hidden=\"true\"></i>
								</a>
							</li>";
					}
					echo "
						</ul>
					</div>
				</div>";
				}
			?>

        </div>
    </div>
    <!-- //team -->