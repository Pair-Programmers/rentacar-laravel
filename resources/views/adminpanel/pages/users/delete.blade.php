<?php
$userId = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "rent_a_car") or die("Connection Error: " . mysqli_error($conn));
$sql = "DELETE FROM users where id = $userId";
$result = $conn->query($sql);
$conn->close();
header('Location: '. "users-list.php");
      die();
?>