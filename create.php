<?php
    $conn = mysqli_connect(
    "localhost",
    "team10",
    "team10", 
    "team10");


$sql = "SELECT * FROM movie_boxoffice WHERE m_id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'</h1>';
echo $row['released_date'];



$sql = "SELECT * FROM movie_boxoffice";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    echo '<h1>'.$row['title'].'</h1>';
    echo $row['released_date'];
}


?>

