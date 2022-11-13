

<?php
$conn = mysqli_connect("localhost", "team10", "team10", "team10");


// 나중에 테이블 바뀌면 조인해야할듯 
$sql_join = "SELECT *, 
rank() over(order by sales desc) AS ranking 
FROM movie_boxoffice";


// 배열 생성
$title_arr = array();
$sales_arr = array();

$result_join = mysqli_query($conn, $sql_join);

$top_10 = 10;
for($i = 1; $i <= $top_10; $i++){
  $row_join = mysqli_fetch_array($result_join);
  array_push($title_arr,$row_join['title']);
  array_push($sales_arr, $row_join['sales']);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="dashstyle.css">

    </head>
    <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="bar-chart-horizontal" width="700" height="450"></canvas>

    <script>
    

    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["<?= $title_arr[0]?>", "<?= $title_arr[1]?>", "<?= $title_arr[2]?>", "<?= $title_arr[3]?>", "<?= $title_arr[4]?>", "<?= $title_arr[5]?>", "<?= $title_arr[6]?>", "<?= $title_arr[7]?>", "<?= $title_arr[8]?>", "<?= $title_arr[9]?>"],
      datasets: [
        {
          label: "원",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#FFC75F","#008F7A","#FBEAFF","#FFD0FF","#FF6F91"],
          data: ["<?= $sales_arr[0]?>", "<?= $sales_arr[1]?>", "<?= $sales_arr[2]?>", "<?= $sales_arr[3]?>", "<?= $sales_arr[4]?>", "<?= $sales_arr[5]?>", "<?= $sales_arr[6]?>", "<?= $sales_arr[7]?>", "<?= $sales_arr[8]?>", "<?= $sales_arr[9]?>"]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Sales Top 10 in Korea's Box Office"
      }
    }
});
    

    
    </script>
    
    </body>
</body>
</html>

