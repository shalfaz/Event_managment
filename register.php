<?php 
include 'db.php';
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $conn->query("INSERT INTO users(name,email,password,role)
    VALUES('$name','$email','$pass','$role')");

    $_SESSION['success'] = "Registered Successfully!";
    header("Location: register.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Register</h2>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<select name="role">
<option value="organizer">Organizer</option>
<option value="participant">Participant</option>
</select>

<button name="submit">Register</button>
</form>

<a href="login.php">Login</a>

<?php
if(isset($_SESSION['success'])){
    echo "<div class='success'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}
?>
</div>