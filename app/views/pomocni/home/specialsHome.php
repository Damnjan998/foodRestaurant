<!-- specials -->
<section class="blog_w3ls py-5">
    <div class="container pb-xl-5 pb-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <p class="w3ls-title-sub">Tasty</p>
            <h3 class="w3ls-title">Our <span>Special</span></h3>
        </div>
        <div class="row">
            <!-- blog grid -->
			<?php
				global $specialsController;
				$rezultatSpecials = $specialsController->specials();

				foreach ($rezultatSpecials as $rs) {
					echo "<div class=\"col-lg-4 col-md-6\">
					<div class=\"card border-0 med-blog\">
						<div class=\"card-header p-0\">
							<a href=\"index.php?page=menu\">
								<img class=\"card-img-bottom\" src=\"$rs->slika\" alt=\"$rs->alt\">
							</a>
						</div>
						<div class=\"card-body border border-top-0\">
							<h5 class=\"blog-title card-title m-0\"><a href=\"index.php?page=menu\">$rs->naziv</a></h5>
							<p class=\"mt-3\">$rs->opis</p>
							<a href=\"index.php?page=menu\" class=\"btn button-w3ls mt-4 mb-3\">View More
								<span class=\"fa fa-caret-right ml-1\" aria-hidden=\"true\"></span>
							</a>
						</div>
					</div>
				</div>";
				}
			?>
        </div>
    </div>
</section>
<!-- //specials -->