
<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      width: 300px;
      border: 1px solid #444444;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #444444;
    }
    </style>
    
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">

</head>


<body>

<!-- 테이블 시작  -->
<table>
<caption>Top 10 RATE IN BOX OFFICE</caption>
<thead>
        <tr>
          <th>Title</th><th>Rating</th>
        </tr>
      </thead>
<?php

$conn = mysqli_connect("localhost", "team10", "team10", "team10");


$sql_join = "SELECT movie_boxoffice.m_id, title, rating, 
rank() over(order by rating desc) AS ranking 
FROM movie_boxoffice LEFT JOIN rating ON movie_boxoffice.m_id = rating.m_id";

$result_join = mysqli_query($conn, $sql_join);



$top_10 = 9;
for($i = 0; $i <= $top_10; $i++){
  $row_join = mysqli_fetch_array($result_join);
?>

      <tbody>
        <tr>
          <td><?php echo $row_join['title'];?></td><td><?php echo $row_join['rating'];?></td>
        </tr>

        <?php }?>

      </tbody>
    </table>


</body>
</html>

