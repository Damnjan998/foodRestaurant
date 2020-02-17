<!-- about -->
<section class="w3ls-bnrbtm py-5" id="about">
    <div class="container py-xl-5 py-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <h3 class="w3ls-title mb-3">About <span>Us</span></h3>
            <p class="titile-para-text mx-auto">Something about Author</p>
        </div>
        <div class="row">
            <div class="col-lg-6 pr-xl-5 mt-xl-2 mt-lg-0">
				<?php
					global $aboutController;
					$rezultatAbout = $aboutController->about();
				?>
                <p class="sub-para"></p>
                <p class="sub-para pt-4 mt-4 border-top"><?= $rezultatAbout->opis ?></p>
            </div>
            <div class="col-lg-6 text-center mt-lg-0 mt-4">
                <img src="<?= $rezultatAbout->slika ?>" alt="<?= $rezultatAbout->alt ?>" class="img-fluid"/>
            </div>
        </div>
    </div>
</section>
<!-- //about -->