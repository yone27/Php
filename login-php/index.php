<?php
session_start();
include('./header.php');
require('helper.php');

$user = array();
if (isset($_SESSION['userId'])) {
    require('mysqli_connect.php');
    $user = getUserInfo($con, $_SESSION['userId']);
}

?>
<section id="main-site">
    <div class="container py-5">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image pb-5 text-center">
                    <img style="width: 200px; height:200px;" src="<?php echo $user['profileimage'] ? $user['profileimage'] : './assets/
                    profile/beard.png' ?>" alt="">
                    <h4 class="py-3">
                        <?php
                        if (isset($user['firstname'])) {
                            printf('%s %s', $user['firstname'], $user['lastname']);
                        }
                        ?>
                    </h4>
                </div>
                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span><?php echo $user['firstname'] ? $user['firstname'] : '' ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span><?php echo $user['lastname'] ? $user['lastname'] : '' ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo $user['email'] ? $user['email'] : '' ?></span></li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./footer.php'); ?>