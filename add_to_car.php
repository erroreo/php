<?php
    $productno = $_GET["productno"];
    $productname = $_GET["productname"];
    $price = $_GET["price"];
    $quantity = $_POST["quantity"];
    $count = $_GET["count"];
    require_once("server.php");
    session_start();
    $link = create_connection();
    if (empty($quantity)) $quantity = 1;
    
    $total = $price * $quantity;
    $username = $_SESSION["username"];
    $sql1 = "SELECT * FROM `shoppingcar`WHERE `username`='$username'";
    $result = execute_sql($link,"test1",$sql1);
    $total_records = mysqli_num_rows($result);
    $row = array(); 
    if($total_records == 0){
        $sql = "INSERT INTO `shoppingcar`(`productno`, `productname`, `price`, `quantity`, `total`, `username`) VALUES ('$productno','$productname','$price','$quantity','$total','$username')";
        execute_sql($link,"test1",$sql);
    }
    for($i = 0; $i < $total_records; $i++){
        $rows = mysqli_fetch_assoc($result);
        array_push($row,$rows["productno"]);
        if($rows["productno"]==$productno && $rows["username"]==$username){
            $quan = $rows["quantity"] + $quantity;
            $sql2 = "UPDATE `shoppingcar` SET `quantity`='$quan' WHERE `username`='$username' AND `productno`=$productno";
            execute_sql($link,"test1",$sql2); 
        }
    }
    $key = array_search($productno,$row);
    var_dump($key);
    if($key == false && $total_records !== 0 && $key !== 0){
        $sql = "INSERT INTO `shoppingcar`(`productno`, `productname`, `price`, `quantity`, `total`, `username`) VALUES ('$productno','$productname','$price','$quantity','$total','$username')";
        execute_sql($link,"test1",$sql);
    }
    mysqli_free_result($result);
    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p align="center">您所選取的產品及數量已成功放入購物車！</p>
    <p align="center"><a href="catalog.php">繼續購物</a></p>
</body>
</html>