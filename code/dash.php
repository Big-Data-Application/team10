<!--조유담-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="dashstyle.css">
      <style>
        table {
        width: 300px;
        border: 1px solid #444444;
        border-collapse: collapse;
        }
        th, td {
        border: 1px solid #444444;
        }
        .scale {
            margin-right: auto;
            margin-left: auto;
            width: 600px;
            height: 500px; 
            
        }

        .chart2{
            margin-right: auto;
            margin-left: auto;
            width: 600px;
            height: 500px; 
        }
        </style>

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


<!-- 두 번째 테이블 시작 -->
<table>
<caption>박스오피스 매출 탑 10위</caption>
<thead>
    <tr>
    <th>Title</th><th>Sales</th>
    </tr>
</thead>

<?php

$conn = mysqli_connect("localhost", "team10", "team10", "team10");


$sql_join = "SELECT *, 
rank() over(order by sales desc) AS ranking 
FROM movie_boxoffice";

$result_join = mysqli_query($conn, $sql_join);

$top_10 = 9;
for($i = 0; $i <= $top_10; $i++){
    $row_join = mysqli_fetch_array($result_join);
?>

<tbody>
<tr>
    <td><?php echo $row_join['title'];?></td><td><?php echo $row_join['sales'];?></td>
</tr>

<?php }?>

</tbody>
</table>


<!-- 테이블 끝 -->


    <!-- 차트1 시작 -->

    <div class = scale>
    <?php
    $conn = mysqli_connect("localhost", "team10", "team10", "team10");


    // 나중에 테이블 바뀌면 조인해야할듯 
    $sql_join = "SELECT *, 
    rank() over(order by audience desc) AS ranking 
    FROM movie_boxoffice 
    ORDER BY ranking LIMIT 10";


    // 배열 생성
    $title_arr = array();
    $sales_arr = array();

    $result_join = mysqli_query($conn, $sql_join);

    $top_10 = 10;
    for($i = 1; $i <= $top_10; $i++){
    $row_join = mysqli_fetch_array($result_join);
    array_push($title_arr,$row_join['title']);
    array_push($sales_arr, $row_join['audience']);
    }
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="bar-chart-horizontal" width="700" height="450"></canvas>

    <script>
    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["<?= $title_arr[0]?>", "<?= $title_arr[1]?>", "<?= $title_arr[2]?>", "<?= $title_arr[3]?>", "<?= $title_arr[4]?>", "<?= $title_arr[5]?>", "<?= $title_arr[6]?>", "<?= $title_arr[7]?>", "<?= $title_arr[8]?>", "<?= $title_arr[9]?>"],
      datasets: [{
          label: "명",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#FFC75F","#008F7A","#FBEAFF","#FFD0FF","#FF6F91"],
          data: ["<?= $sales_arr[0]?>", "<?= $sales_arr[1]?>", "<?= $sales_arr[2]?>", "<?= $sales_arr[3]?>", "<?= $sales_arr[4]?>", "<?= $sales_arr[5]?>", "<?= $sales_arr[6]?>", "<?= $sales_arr[7]?>", "<?= $sales_arr[8]?>", "<?= $sales_arr[9]?>"]
        }]},
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "박스오피스 관람객 탑 10"
        }
        }
    });
    </script>
    </div>

    <!-- 차트1 끝 -->

    <!-- 차트2 시작 -->

    <div class = chart2>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
    
    <canvas id="bar-chart" width="800" height="450"></canvas>

    <script>
    <?php
    $conn = mysqli_connect("localhost", "team10", "team10", "team10");


    // 나중에 테이블 바뀌면 조인해야할듯 
    $sql_join = "SELECT *, 
    rank() over(partition by country order by sales desc) AS ranking 
    FROM movie_boxoffice 
    ORDER BY country,ranking LIMIT 10";


    // 배열 생성
    $title_arr = array();
    $sales_arr = array();

    $result_join = mysqli_query($conn, $sql_join);

    $top_10 = 10;
    for($i = 1; $i <= $top_10; $i++){
    $row_join = mysqli_fetch_array($result_join);
    array_push($title_arr,$row_join['title']);
    array_push($sales_arr, $row_join['sales']/1000000);
    }
    ?>
    

    new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["<?= $title_arr[0]?>", "<?= $title_arr[1]?>", "<?= $title_arr[2]?>", "<?= $title_arr[3]?>", "<?= $title_arr[4]?>", "<?= $title_arr[5]?>", "<?= $title_arr[6]?>", "<?= $title_arr[7]?>", "<?= $title_arr[8]?>", "<?= $title_arr[9]?>"],
      datasets: [
        {
          label: "million won",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#FFC75F","#008F7A","#FBEAFF","#FFD0FF","#FF6F91"],
          data: ["<?= $sales_arr[0]?>", "<?= $sales_arr[1]?>", "<?= $sales_arr[2]?>", "<?= $sales_arr[3]?>", "<?= $sales_arr[4]?>", "<?= $sales_arr[5]?>", "<?= $sales_arr[6]?>", "<?= $sales_arr[7]?>", "<?= $sales_arr[8]?>", "<?= $sales_arr[9]?>"]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Top 10 Korean Movie in Sales among All-time Korea's Box Office"
      }
    }
});
    

    
    </script>
    
    

</div>


</body>
</html>
