<?php
    $product_no = $_GET["productno"];
    $product_name = $_POST["productname"];
    $price = $_POST["price"];
    $count = $_POST["count"];

    require_once("server.php");
    
    $link = create_connection();
    $sql = "UPDATE product SET price='$price', count='$count', productname='$product_name' WHERE productno='$product_no'";
    execute_sql($link,"test1",$sql);
    mysqli_close($link);
    header("location:catalog.php");
?>