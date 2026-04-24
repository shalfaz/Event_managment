<?php
session_start();
include 'db.php';

$user = $_SESSION['user'];

if(isset($_POST['create'])){
    $conn->query("INSERT INTO events(title,description,event_date,created_by)
    VALUES('$_POST[title]','$_POST[desc]','$_POST[date]','$user[id]')");

    header("Location: dashboard.php"); // auto redirect
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Create Event</h2>

<form method="POST">
<input type="text" name="title" placeholder="Title" required>
<textarea name="desc" placeholder="Description"></textarea>
<input type="date" name="date" required>
<button name="create">Create</button>
</form>

<br>
<a href="dashboard.php">← Back to Dashboard</a>
</div>