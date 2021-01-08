<?php
require('helper.php');
// error varible 
$error = array();

$firstName = varialbe_input_text($_POST['firstName']);
if (empty($firstName)) {
    $error[] = "You forgot to enter your first name";
}
$lastName = varialbe_input_text($_POST['lastName']);
if (empty($lastName)) {
    $error[] = "You forgot to enter your last name";
}
$email = varialbe_input_text($_POST['email']);
if (empty($email)) {
    $error[] = "You forgot to enter your email";
}
$password = varialbe_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "You forgot to enter your password";
}
$confirmPassword = varialbe_input_text($_POST['confirmPassword']);
if (empty($confirmPassword)) {
    $error[] = "You forgot to enter your confirm password";
}
$files = $_FILES['uploadProfile'];
$profileImage = upload_profile("./assets/profile/",$files);

if (empty($error)) {
    // register new user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    require('mysqli_connect.php');

    // mysql query
    $query = "INSERT INTO user (firstname, lastname, email, password, profileimage, registerDate)";
    $query .= "VALUES(?,?,?,?,?,NOW())";

    // initialize statemente
    $q = mysqli_stmt_init($con);

    // prepare sql statement
    mysqli_stmt_prepare($q, $query);

    // bring values
    mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage);

    // execute statement 
    mysqli_stmt_execute($q);

    if (mysqli_stmt_affected_rows($q) == 1) {
        // start new session
        session_start();
        // session variable 
        $_SESSION['userId'] = mysqli_insert_id($con);
        header('Location:login.php');exit();
    } else {
        print 'error while registration';
    }
} else {
    echo 'not validate';
}
