<?php



// session_start();
// $user_id = $_SESSION['id'];


$user_id = $_POST['user_id'];
$movie_id = $_POST['movie'];
$user_rating = $_POST['num'];
echo $user_id;
echo $movie_id;
echo $user_rating;


$conn = mysqli_connect("localhost", "team10", "team10", "team10");

$sql = "INSERT INTO 'user_rating'('u_id', 'm_id', 'u_rating') VALUES ($user_id ,  $movie_id, $user_rating)";
$result = mysqli_query($conn, $sql);
if ($result == false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    header('Location : detail2.php');
}



?>
