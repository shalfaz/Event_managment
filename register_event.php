<?php
session_start();
include 'db.php';

$uid = $_SESSION['user']['id'];
$eid = $_GET['id'];

$conn->query("INSERT INTO registrations(user_id,event_id)
VALUES('$uid','$eid')");

header("Location: dashboard.php");
exit();
?>