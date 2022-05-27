<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="catalog">
        <td>產品編號</td>
        <td>產品名稱</td>
        <td>產品價格</td>
        <td>剩餘數量</td>
        <td>選擇數量</td>
        <td>進行訂購</td>
        <td>修改</td>
        <td>下架</td>
    <?php
        require_once("server.php");
        $link = create_connection();
        $sql = "SELECT * FROM product";
        $result = execute_sql($link,"test1",$sql);
        $total_records = mysqli_num_rows($result);
        
        for($i = 0; $i < $total_records; $i++){
            $rows = mysqli_fetch_assoc($result);
            echo "<form method='post' action='add_to_car.php?productno=".$rows["productno"]."&productname=".$rows["productname"]."&price=".$rows["price"]."&count=".$rows["count"]."'>";
            echo "<tr align='center' bgcolor='#EDEAB1'>";
            echo "<td>".$rows["productno"]."</td>";
            echo "<td>".$rows["productname"]."</td>";
            echo "<td>".$rows["price"]."</td>";
            echo "<td>".$rows["count"]."</td>";
            echo "<td><input type='text' name='quantity' size='5' value='1'></td>";
            echo "<td><input type='submit' value='放入購物車'>";
            echo "</form>";
            echo "<form method='post' action='edit.php?productno=".$rows["productno"]."&productname=".$rows["productname"]."&price=".$rows["price"]."&count=".$rows["count"]."'>";
            echo "<td><input type='submit' value='修改'></td>";
            echo "</form>";
            echo "<form method='post' action='del.php?productno=".$rows["productno"]."'>";
            echo "<td><input type='submit' value='下架'></td>";
            echo "</form>";
            echo "</tr>";
        }
        mysqli_free_result($result);
        mysqli_close($link);
    ?>
    <tr height="30" bgcolor="#EDF5F5" align="center">
        <td><a href="upload1.php" target="bottom">新增</a></td>
    </tr>
    </table>
</body>
</html>