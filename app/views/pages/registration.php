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
                <h5 class="text-center mb-4">Register Now</h5>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="tbIme" name="name" placeholder="" required="">
                        <label id="greskaName">Example : John </label>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" id="tbPrezime" name="lastName" placeholder=""
                               required="">
                        <label id="greskaPrezime">Example : Tompson</label>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="tbEmail" name="email" placeholder="" required="">
                        <label id="greskaMail">Example : example@gmail.com</label>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Password</label>
                        <input type="password" class="form-control" id="tbPassword" name="password" id="password1"
                               placeholder="" required="">
                        <label id="greskaSifra">Example : Lozinka123</label>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="tbConfirmPassword" name="confirmPassword"
                               id="password2" placeholder="" required="">
                    </div>
                    <button type="submit" id="btnRegister" class="btn submit mb-4">Register</button>
                    <p class="text-center">
                        By clicking Register, I agree to your terms!
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>