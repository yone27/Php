<?php

// error varible 
$error = array();

$email = varialbe_input_text($_POST['email']);
if (empty($email)) {
    $error[] = "You forgot to enter your email";
}
$password = varialbe_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "You forgot to enter your password";
}

if (empty($error)) {
    $query = "SELECT * FROM user WHERE email = ?";
    $q = mysqli_stmt_init($con);

    mysqli_stmt_prepare($q, $query);

    // bind parameters
    mysqli_stmt_bind_param($q, 's', $email);

    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)) {
        // verify password
        if (password_verify($password, $row['password'])) {
            // start new session
            session_start();
            // session variable 
            $_SESSION['userId'] = $row['userId'];
            header("location:index.php");
            exit();
        } else {
            print "clave invalida";
        }
    } else {
        print "you are not registered";
    }

    if (mysqli_stmt_affected_rows($q) == 1) {
        header('Location:login.php');
        exit();
    } else {
        print 'error while registration';
    }
} else {
    echo 'not validate';
}
