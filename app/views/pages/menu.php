<?php
	include "app/views/pomocni/pageDetails.php";
?>
<!-- menu -->
<section class="portfolio py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <h3 class="w3ls-title mb-3">Our <span>Menu</span></h3>
            <select id="selectProductSort">
                <option value="0">Sort</option>
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
            </select>
            <input type="search" id="poljePretraga" placeholder="Search..">
        </div>
        <div class="row mt-4" id="proizvodiMeni">

        </div>
        <div id="paginacija">
            <ul id="stilPaginacija">

            </ul>
        </div>
    </div>
</section>

<!-- //menu -->
