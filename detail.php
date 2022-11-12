<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Ranking</title>
</head>

<body>
    <p id=ranking_title>
        RANKING
    </p>
    <div style="margin: auto;text-align: center;margin-bottom: 40px;">
        <form action="film_search.php" style="display: inline-block;">
            <div id="act_search_title">영화 검색</div>
            <input name="title" type="text" placeholder="영화 제목 입력">
            <input type="submit" value="search">
        </form>
    </div>
    <div style="margin: auto;text-align: center;margin-bottom: 40px;">
        <form action="actor_search.php" style="display: inline-block;">
            <div id="act_search_title">출연작 검색</div>
            <input name="name" type="text" placeholder="배우 이름 입력">
            <input type="submit" value="search">
        </form>
    </div>

    <div>
        <table id="audience_table">
            <thead>
                <tr align="center">
                    <th id="audience_table_th" width=100>Ranking</th>
                    <th id="audience_table_th" width=200>제목</th>
                    <th id="audience_table_th" width=200>개봉 일자</th>
                    <th id="audience_table_th" width=200>관객수</th>
                    <th id="audience_table_th" width=100>제작 국가</th>
                    <th id="audience_table_th" width=500>제작사</th>
                </tr>
            </thead>
            <!-- <?php
            $mysqli = mysqli_connect("localhost", "team10", "team10", "team10");
            $sql = 'SELECT * FROM movie_boxoffice_ranking ORDER BY ranking ASC';
            $res = mysqli_query($mysqli, $sql);

            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tbody>
                    <tr align="center">
                        <td id="audience_table_td"><?php echo $row['ranking'] ?></td>
                        <td id="audience_table_td"><?php echo $row['title'] ?></td>
                        <td id="audience_table_td"><?php echo $row['date'] ?></td>
                        <td id="audience_table_td"><?php echo $row['audience'] ?></td>
                        <td id="audience_table_td"><?php echo $row['country'] ?></td>
                        <td id="audience_table_td"><?php echo $row['distributor'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</body> -->

//</html>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_GET['name']; ?></title>

  <meta charset="utf-8">
  <link rel="stylesheet">
  <style>
    </head>


<body>
	
	<h1>코딩의 민족</h1>
	<h2>넌 코딩할 때가 제일 이뻐</h2>


    <?php
    $conn = mysqli_connect("localhost", "team10", "team10", "team10");

    // 서버에 연결 실패 시 
    if (mysqli_connect_errno()){
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    } else {
        $sql = "SELECT poster열 FROM poster있는테이블 where   ";
        $res = mysqli_query($conn, $sql);

        echo mysqli_error($sql);
    }

    while ($row = mysqli_fetch_array($res)) {
    ?>
        <tbody>
            <tr align="center">
                <td id="audience_table_td"><?php echo $row['ranking'] ?></td>
                <td id="audience_table_td"><?php echo $row['title'] ?></td>
                <td id="audience_table_td"><?php echo $row['date'] ?></td>
                <td id="audience_table_td"><?php echo $row['audience'] ?></td>
                <td id="audience_table_td"><?php echo $row['country'] ?></td>
                <td id="audience_table_td"><?php echo $row['distributor'] ?></td>
            </tr>
        </tbody>
    <?php } ?>

	<div class = food>
		<img src="images/chicken.jpeg", width="300px" height="200px">

		<div class = "text_area">
			<h3>코딩에 빠진 닭</h3>
			<p class = "explain">주머니 가벼운 당신의 마음까지 생각한 착한 가격 !</p2>
			
			<div class = urls>
				<a bref = "#">바로 결제</a>
			</div>

		</div>
	</div>

	<div class = food>
		<img src="images/sushi.jpeg", width="300px" height="200px">

		<div class = "text_area">
			<h3>코코스시</h3>
			<p class = "explain">주머니 가벼운 당신의 마음까지 생각한 착한 가격 !</p2>
			
			<div class = urls>
				<a bref = "#">바로 결제</a>
			</div>

		</div>
	</div>



	<div class = food>
		<img src="images/burger.jpeg", width="300px" height="200px">

		<div class = "text_area">
			<h3>코데리아</h3>
			<p class = "explain">주머니 가벼운 당신의 마음까지 생각한 착한 가격 !</p2>
			
			<div class = urls>
				<a bref = "#">바로 결제</a>
			</div>

		</div>
	</div>

	<div class = food>
		<img src="images/bibimbap.jpeg", width="300px" height="200px">

		<div class = "text_area">
			<h3>코가네</h3>
			<p class = "explain">주머니 가벼운 당신의 마음까지 생각한 착한 가격 !</p2>
			
			<div class = urls>
				<a bref = "#">바로 결제</a>
			</div>

		</div>
	</div>





</body>
</html>

