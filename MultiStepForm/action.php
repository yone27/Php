<?php
if(isset($_POST)){
    $name = $_POST['name']; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    printf('Nombre: %s <br> Username: %s <br> Email: %s <br> phone: %s <br> hashpassword: %s ', $name, $username, $email, $phone, $password);
}