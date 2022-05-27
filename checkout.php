<?php
    $product_no = $_GET["productno"];
    session_start();
    $username = $_SESSION["username"];
    require_once("server.php");
    $link = create_connection();
    if($product_no == "false"){
        $sql2 = "SELECT * FROM `shoppingcar` WHERE `username`='$username'";
        $sql3 = "SELECT * FROM product";
        $result1 = execute_sql($link,"test1",$sql3);
        $result = execute_sql($link,"test1",$sql2);
        $total_records = mysqli_num_rows($result);
        $total_records1 = mysqli_num_rows($result1);
        for($i = 0; $i < $total_records; $i++){
            $rows = mysqli_fetch_assoc($result);
            $productno = $rows["productno"];
            $sql = "INSERT INTO `checkout`(`productno`, `productname`, `price`, `quantity`, `total`, `username`) VALUES ('$productno','$rows[productname]','$rows[price]','$rows[quantity]','$rows[total]','$username')";
            execute_sql($link,"test1",$sql);
            for($j = 0;$j < $total_records1; $j++){
                $rows1 = mysqli_fetch_assoc($result1);
                if($rows1["productno"]==$productno){
                    $cont = $rows1["count"]-$rows["quantity"];
                    $sql4 = "UPDATE `product` SET `count`='$cont' WHERE `productno`=$rows1[productno]";
                    execute_sql($link,"test1",$sql4);
                    break;
                }
            }
        }
        $del = "DELETE FROM `shoppingcar` WHERE `username`='$username'";
        execute_sql($link,"test1",$del);
    }else{
        $sql1 = "SELECT * FROM `shoppingcar` WHERE `productno`=$product_no AND `username`='$username'";
        $sql5 = "SELECT * FROM product";
        $result = execute_sql($link,"test1",$sql1);
        $result1 = execute_sql($link,"test1",$sql5);
        $total_records = mysqli_num_rows($result);
        $total_records1 = mysqli_num_rows($result1);
        for($i = 0; $i < $total_records; $i++){
            $rows = mysqli_fetch_assoc($result);
            $productno = $rows["productno"];
            $sql = "INSERT INTO `checkout`(`productno`, `productname`, `price`, `quantity`, `total`, `username`) VALUES ('$rows[productno]','$rows[productname]','$rows[price]','$rows[quantity]','$rows[total]','$username')";
            execute_sql($link,"test1",$sql);
            for($j = 0;$j < $total_records1; $j++){
                $rows1 = mysqli_fetch_assoc($result1);
                if($rows1["productno"]==$productno){
                    $cont = $rows1["count"]-$rows["quantity"];
                    $sql4 = "UPDATE `product` SET `count`='$cont' WHERE `productno`=$rows1[productno]";
                    execute_sql($link,"test1",$sql4);
                    break;
                }
            }
        }
        $del1 = "DELETE FROM `shoppingcar` WHERE `username`='$username' AND `productno`=$product_no";
        execute_sql($link,"test1",$del1);
    }
    mysqli_free_result($result);
    mysqli_close($link);
?>