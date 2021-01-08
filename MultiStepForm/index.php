<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Step form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #second,
        #third,
        #result {
            display: none;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light p-4 rounded mt-5">
                <h5 class="text-center text-light bg-success mb-2 p-2 rounded lead" id="result">Hello World!</h5>
                <div class="progress mb-2" style="height:40px;">
                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 20%; transition: all .4s ease-in-out;" id="progressBar">
                        <b class="lead" id="progressText">Step -1</b>
                    </div>
                </div>
                <form action="" method="post" id="form-data">
                    <div id="first">
                        <h4 class="text-center bg-primary p-1 rounded text-light">Personal Information</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="full name">
                            <b class="form-text text-danger" id="nameError"></b>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <b class="form-text text-danger" id="usernameError"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="next-1">Next</a>
                        </div>
                    </div>
                    <div id="second">
                        <h4 class="text-center bg-primary p-1 rounded text-light">Contact Information</h4>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <b class="form-text text-danger" id="emailError"></b>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone">
                            <b class="form-text text-danger" id="phoneError"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-2">Previous</a>
                            <a href="#" class="btn btn-danger" id="next-2">Next</a>
                        </div>
                    </div>
                    <div id="third">
                        <h4 class="text-center bg-primary p-1 rounded text-light">Choose Password</h4>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                            <b class="form-text text-danger" id="passError"></b>
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="cpass" class="form-control" placeholder="Confirm your password">
                            <b class="form-text text-danger" id="cPassError"></b>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-danger" id="prev-3">Previous</a>
                            <input type="submit" name="submit" value="submit" id="submit" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>