<?php

$conn = mysqli_connect("localhost", "team10", "team10", "team10");

$u_rating = $_POST['number'];
$sql = "INSERT INTO `user_rating`(`u_id`, `m_id`, `u_rating`) VALUES ([value-1],[value-2],$u_rating)";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


$id = $row['m_id'];

$sql_d = "SELECT * FROM director WHERE m_id = '$id'";
$result_d = mysqli_query($conn, $sql_d);
$row_d = mysqli_fetch_array($result_d);

$sql_r = "SELECT * FROM rating WHERE m_id = '$id'";
$result_r = mysqli_query($conn, $sql_r);
$row_r = mysqli_fetch_array($result_r);


?>
