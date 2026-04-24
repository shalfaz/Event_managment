<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['update'])){
    $conn->query("UPDATE events SET 
    title='$_POST[title]',
    description='$_POST[desc]',
    event_date='$_POST[date]'
    WHERE id=$id");

    header("Location: dashboard.php");
    exit();
}

$res = $conn->query("SELECT * FROM events WHERE id=$id");
$row = $res->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Edit Event</h2>

<form method="POST">
<input type="text" name="title" value="<?php echo $row['title']; ?>" required>
<textarea name="desc"><?php echo $row['description']; ?></textarea>
<input type="date" name="date" value="<?php echo $row['event_date']; ?>" required>
<button name="update">Update</button>
</form>

<br>
<a href="dashboard.php">← Back to Dashboard</a>
</div>