<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        margin:auto;
        background-color:lightyellow;
        border-width: 2px;
    }
</style>
<body>
    <table>
        <tr>
            <td>商品編號:</td>
            <td>商品名稱:</td>
            <td>商品價格:</td>
            <td>商品數量:</td>
            <td>總金額:</td>
        </tr>
        <?php
            require_once("server.php");
            $link = create_connection();
            $sql = "SELECT * FROM `checkout`";
            $result = execute_sql($link,"test1",$sql);
            $total_records = mysqli_num_rows($result);
            for($i = 0; $i < $total_records; $i++){
                $rows = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>".$rows["productno"]."</td>";
                echo "<td>".$rows["productname"]."</td>";
                echo "<td>".$rows["price"]."</td>";
                echo "<td>".$rows["quantity"]."</td>";
                echo "<td>".$rows["total"]."</td>";
            }
        ?>
    </table>
</body>
</html>
