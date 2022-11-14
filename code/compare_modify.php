<!--홍진서-->

<?php
    session_start();
    $mysqli = mysqli_connect("localhost", "team10", "team10", "team10");

    $sql_select = "SELECT * FROM compare_data WHERE u_id = ?";
    $sql_update = "UPDATE compare_data SET input_sales = ?, input_audience = ? WHERE u_id = ?";

    //임시
    $user_id = "JINSEO";

    $stmt = $mysqli->prepare($sql_select);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result_s = $stmt->get_result();
    $row_s = mysqli_fetch_array($result_s)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="compare_modify_result.php" method="post">
        <table>
            <tr>
                <td>Title</td>
                <td><?php echo "{$row_s['input_title']}"?></td>
            </tr>
            <tr>
                <td>Sales</td>
                <td><input type="textbox" name="modify_sales" value="<?php echo "{$row_s['input_sales']}"?>"></td>
            </tr>
            <tr>
                <td>Audiences</td>
                <td><input type="textbox" name="modify_audience" value="<?php echo "{$row_s['input_audience']}"?>"></td>
            </tr>
        </table>

        <input type="submit" value="Change the data">
    </form>

</body>
</html>