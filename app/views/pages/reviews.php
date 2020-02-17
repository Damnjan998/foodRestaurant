<?php
	include "app/views/pomocni/pageDetails.php";
?>
<div class="col-lg-12 left-blog-info text-left">
    <div class="comment-top">
        <div id="naslovKomentara">
            <h2 class="w3ls-title mb-3">Customer <span id="naslov">Comments</span></h2>
        </div>
        <div id="okvirKomentara">
			<?php
				global $reviewController;
				$rezultatKomentar = $reviewController->getKomentari();
				$brojac = 1;

				foreach ($rezultatKomentar as $rk) {
					echo "<div class=\"media mt-3\">
								<div class=\"media-body\" class=\"komentar\">
								     <h2>Comment number #" . $brojac++ . "</h2>
									<h4 class=\"mt-0\">Customer name: $rk->ime $rk->prezime</h4>
									<h5 class=\"mt-1\">Subject: $rk->naslov</h5>
									<p>Message: $rk->poruka</p>
								</div>
							</div>";
				}
			?>
        </div>
    </div>
    <hr/>
    <div id="formaOkvir">
        <div class="leaveComment comment-top">
            <h4 id="naslovLeaveComment">Leave a Comment</h4>
            <div class="comment-bottom">
                <form action="#" method="post">
                    <div class="form-group">
                        <input class="form-control" id="tbSubject" type="text" name="Subject" placeholder="Subject"
                               required="">
                        <label id="greskaSubject">Example : Food</label>
                    </div>
                    <div class="form-group">
										<textarea class="form-control" id="tbMessage" name="Message"
                                                  placeholder="Message..."
                                                  required=""></textarea>
                        <label id="greskaMessage">Example : Delicious!</label>
                    </div>
					<?php
						if (isset($_SESSION['korisnik'])) {
							echo "<button type=\"submit\" id=\"btnComment\" class=\"btn btn-primary submit\">Submit</button>";
						} else {
							echo "<div id='linkButton'>
													<a href = \"index.php?page=logovanje\">You must be signed in!</a>
												</div>";
						}
					?>
                </form>
            </div>
        </div>
    </div>
</div>