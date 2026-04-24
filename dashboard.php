<?php
session_start();
include 'db.php';

$user = $_SESSION['user'];
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Dashboard</h2>

<a href="logout.php">Logout</a><br><br>

<?php if($user['role'] == 'organizer'){ ?>
<a href="create_event.php">Create Event</a><br><br>
<?php } ?>

<h3>All Events</h3>

<?php
$res = $conn->query("SELECT * FROM events");

if($res->num_rows == 0){
    echo "No events yet.";
}

while($row = $res->fetch_assoc()){
    echo "<b>".$row['title']."</b> - ".$row['event_date'];

    if($user['role'] == 'organizer'){
        echo " <a href='edit_event.php?id=".$row['id']."'>Edit</a>";
        echo " <a href='delete_event.php?id=".$row['id']."'>Delete</a>";
    }

    echo " <a href='register_event.php?id=".$row['id']."'>Join</a><br><br>";
}
?>
</div>