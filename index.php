<?php
    $conn = mysqli_connect(
    "localhost",
    "team10",
    "team10", 
    "team10");
    $sql = "SELECT * FROM movie_boxoffice";
    $result = mysqli_query($conn, $sql);
    $list = '';
    

    while($row = mysqli_fetch_array($result)){
        $list = $list."<li><a 
        href = \"index.php?m_id={$row['m_id']}\">{$row['title']}</a>
        </li>";
    }


    $sql = "SELECT * FROM movie_boxoffice WHERE m_id = {$_GET['m_id']}"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
        'title' => $row['title'],
        'released_date' => $row['released_date']
    );
    print_r($article);
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <ol>
    <?php
    echo $list
    ?>
    </ol>
</head>
<body>
<a href = "create.php"> create </a> 
<h2><?=$article['title']?></h2>
<?=$article['released_date']?>
</body>