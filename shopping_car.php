<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
</head>
<style>
    table{
    margin:auto;
    background-color:lightyellow;
    border-width: 2px;
    border-color: black;
}
</style>
<body>
    <table>
        <tr>
            <td>商品編號</td>
            <td>商品名稱</td>
            <td>商品價格</td>
            <td>商品數量</td>
            <td>總金額</td>
            <td>變更數量</td>
            <td>結帳    </td>
        </tr>
        <?php
            require_once("server.php");
            $link = create_connection();
            session_start();
            $username = $_SESSION["username"];
            $sql = "SELECT * FROM `shoppingcar` WHERE `username` = '$username'";
            $result = execute_sql($link,"test1",$sql);
            $total_records = mysqli_num_rows($result);
            $total = 0;
            for($i = 0; $i < $total_records; $i++){
                $rows = mysqli_fetch_assoc($result);
                $total += $rows["total"];
                echo "<form method='post' action='change.php?productno=".$rows['productno']."&price=".$rows["price"]."'>";
                echo "<tr>";
                echo "<td>".$rows["productno"]."</td>";
                echo "<td>".$rows["productname"]."</td>";
                echo "<td>".$rows["price"]."</td>";
                echo "<td><input type='text' name='quantity' value=".$rows['quantity']." size='5'></td>";
                echo "<td>".$rows["total"]."</td>";
                echo "<td><input type='submit' value='修改'></td>";
                echo "</form>";
                echo "<form method='post' action='checkout.php?productno=".$rows['productno']."'>";
                echo "<td><input type='submit' value='結帳'></td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "<form method='post' action='checkout.php?productno=false'>";
            echo "<tr>";
            echo "<td colspan='6' align='center'>總金額:".$total."</td>";
            echo "<td><input type='submit' value='結帳'></td>";
            echo "</tr>";

            mysqli_free_result($result);
            mysqli_close($link); 
        ?>
    </table>
</body>
</html>