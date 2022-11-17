
<!-- 김다희 dahee kim-->
<?php
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors", 0);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        
Container{
    display: inline;
    justify-content: space-between;
    height: 4.16vw;
    z-index: 1;
    width: 74vw;
    max-width: 1100px;

}
mainContainer{
    background: white;
    display: grid;
    justify-content: center;
    align-items: center;
    /* padding: 0 30px; */
    height: 200px;
    width:100%;
    position: relative;
    z-index: 1;
}
table{
            background: lightblue;
            display: grid;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: auto;
            margin-top: 100px;
            /* padding: 60px; */
            border-radius: 10px;
            border: 1px solid lightslategray;
        }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
td{font-size: 15px;
            line-height: 2rem;
            padding: 0.2em 0.4em;}
            
li {
    float: left;
}
        
h1{
            color: black; font-size: 40px;text-align: center;
        }
        h2{
            color:black; text-align:center;
        }
        .center-button{
            text-align:center;
        }
        button{
            background-color: azure;

            border: 1px black;

            color: black;

            padding: 15px 30px;

            text-align: center;

            text-decoration: none;



            display: inline-block;

            font-size: 16px;

            margin: 4px 2px;

            cursor: pointer;
            border-radius: 5px;
        }


    </style>

</head>

<body>
<!--네비게이션 바-->
<header id="main_header">
        <nav>
            <a id="logo" href="main.php"> Team10, MOVIE </a>
            
            <ul class="header_ul">
                <?php
                session_start();
                if (isset($_SESSION['name'])) { ?>
                    <li class="header_li"><a href="./logout.php"> Log out</a></li>
                    <li class="header_li"><a href="./mypage.php"> My page</a></li>
                    <li class="header_li"><a href="./sales_month.php"> Sales</a></li>
                    <li class="header_li"><a href="./director.php"> Director</a></li>
                    <li class="header_li"><a href="./dash.php">DashBoard</a></li>
                    <li class="header_li"><a href="./genre.php"> Genre</a></li>
                   
                   
                    <li class="header_li"><form action="filter.php" method="post">
                        <input type="hidden" name="country" value="Korea">
                        <input type="hidden" name="rate" value="5">
                        <input type="hidden" name="year" value="2020">
                        <input type="hidden" name="aud" value="all">
                        <input type="hidden" name="audMin" value="0">
                        <input type="hidden" name="audMax" value="20000000">
                        <input type="hidden" name="search_input" value="true">
                        <input type="submit" value="Filter" id="filter_submit">
                    </form></li>
                
                    <li class = "header_li"><a href="./newdirector.php"> 감독정보등록</a></li>
                    <li class = "header_li"><a href="./modifydirector.php"> 감독정보수정</a></li>
                    <li class = "header_li"><a href="./delete.php"> 감독정보삭제</a></li>
                <?php
                } else { ?>
                    <li class="header_li"><a href="./login.php"> Login</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="center-button">
        <h1> 감독이름 검색: </h1>
        <h2>삭제할 감독의 이름을 검색하세요</h2>
        <form action="delete.php" method="GET">
                       
                        <input type="textbox" name="di" placeholder="감독의 이름을 입력하세요">
                        <input type="submit" value="검색하기">
                    </form>
            </div>



<?php 
   
        $mysqli=mysqli_connect("localhost","team10","team10","team10","3307");
   
        // if(isset($_GET['director'])){
        //     $director=$_GET['director'];
        // }else{
        //     $director="2";
        // }
        // DELETE FROM dt, da ,di
        // using director_table as dt 
        //             join director_id as di 
        //             on dt.director=di.director
        //             join director_award as da 
        //             on di.d_id=da.d_id 
        //             WHERE dt.director='test1'//여기만 바꾸기..가능?
        // $sql="DELETE FROM 
        // director_table 
        // WHERE director='$director'";

        $sql="DELETE FROM dt, da ,did using director_table as dt 
            join director_id as did 
            on dt.director=did.director
            join director_award as da 
            on did.d_id1=da.d_id2
            WHERE dt.director='{$_GET['di']}'";
        //$sql="DELETE FROM director_table,director award WHERE director={$_GET['di']}";
        $result=mysqli_query($mysqli,$sql);
        // $list = '';

        // if(mysqli_num_rows($result) == 0){
        //     $list = $list."<tr><td colspan=\"5\">결과가 없습니다.</td></tr>";
        // }else{
        //     while($row = mysqli_fetch_array($result)){
        //         $director = $row['director'];

                
        //         $list = $list."<tr><td><a href='./detail.php?director=$director'>{$director}</a></td><td>{$row['film1']}</td><td>{$row['film2']}</td><td>{$row['film3']}</td><td>{$row['award']}</td></tr></br>";
        //     }
        // }echo $list;  
       
// 물어보는거 구현...ㅅㅂ..
        // if($result=mysqli_query($mysqli,$sql)){
        //     echo "<script>alert('감독정보가 삭제되었습니다.')</script>";
        // }else{
        //     echo "<script>alert('오류.')</script>";
        // }
?>
</body>
</html>