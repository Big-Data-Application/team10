<!--홍진서-->
<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<?php
session_start();
$mysqli = mysqli_connect("localhost", "team10", "team10", "team10");

$sql_insert = "INSERT INTO compare_data(u_id, input_title, input_sales, input_audience) VALUES (?, ?, ?, ?)";

$input_title = $_POST['input_title'];
$input_sales = $_POST['input_sales'];
$input_audience = $_POST['input_audience'];

$user_id = $_SESSION['id'];

$stmt = $mysqli->prepare($sql_insert);
$stmt->bind_param("ssii", $user_id, $input_title, $input_sales, $input_audience);
$stmt->execute();
$result = $stmt->get_result();

echo "<script>alert('Check the result!')</script>";
echo "<script>location.href='industry.php?yearOfData=2022&monthOfData=11';</script>";
?>