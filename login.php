<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");

    if($res->num_rows > 0){
        $_SESSION['user'] = $res->fetch_assoc();
        header("Location: dashboard.php");
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Login</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
</form>
</div>