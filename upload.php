<?php
    $product_no = $_POST["productno"];
    $product_name = $_POST["productname"];
    $count = $_POST["count"];
    $price = $_POST["price"];
    require_once("server.php");

    $link = create_connection();
    if(empty($product_no)){
        echo "請輸入完全";

    }else{
        $sql1 = "SELECT * FROM `product` WHERE productno = $product_no";
        $result = execute_sql($link,"test1",$sql1);
        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO product(productno, price, count, productname) VALUES ('$product_no','$price','$count','$product_name')";
            execute_sql($link,"test1",$sql);
        }else{
            echo "<script type='text/javascript'>alert('產品編號重複')</script>";
        }
    }
    mysqli_close($link);
    ?>