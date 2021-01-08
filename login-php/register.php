<?php
include('./header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('register-process.php');
}
?>
<!-- Registration area -->
<section id="register">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Register</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                <span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="./assets/camera-solid.svg" alt="Upload image">
                    </div>
                    <img src="./assets/profile/beard.png" style="width: 200px; height:200px;" class="img rounded-circle" alt="default image profile">
                    <small class="form-text text-black-50">Choose image</small>
                    <input form="reg-form" type="file" name="uploadProfile" id="uploadProfile" class="form-control-file">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="register.php" method="POST" enctype="multipart/form-data" id="reg-form">
                    <div class="form-row">
                        <div class="col"> 
                            <input type="text" value="<?php if(isset($_POST['firstName'])) print($_POST['firstName']) ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                            <input type="text" value="<?php if(isset($_POST['lastName'])) print($_POST['lastName']) ?>" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" value="<?php if(isset($_POST['email'])) print($_POST['email']) ?>" required name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
                            <small id="confirm_error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input <?php if(isset($_POST['agreement'])) print("checked") ?> type="checkbox" name="agreement" class="form-check-input" required>
                        <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="q#">term, conditions, and policy</a>(*)</label>
                    </div>
                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- #Registration area -->
<?php include('./footer.php'); ?>