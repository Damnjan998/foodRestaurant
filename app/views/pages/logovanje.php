<?php
	if (isset($_SESSION["korisnik"])) {
		header("location: index.php?page=home");
	}
	include "app/views/pomocni/pageDetails.php";
?>
<div class="login-contect py-5">
    <div class="container py-xl-5 py-3">
        <div class="login-body">
            <div class="login p-4 mx-auto">
                <h5 class="text-center mb-4">Login Now</h5>
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Your email</label>
                        <input type="text" class="form-control" id="tbEmail" name="email" placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Password</label>
                        <input type="password" class="form-control" id="tbPassword" name="password" placeholder=""
                               required="">
                    </div>
                    <button type="submit" id="btnLogin" class="btn submit mb-4">Login</button>
                    <p class="account-w3ls text-center text-da">
                        Don't have an account?
                        <a href="index.php?page=registration">Create one now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>