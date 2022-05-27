<?php
    session_start();
    $username = $_SESSION["username"];
    $product_no = $_GET["productno"];
    $quantity = $_POST["quantity"];
    $price = $_GET["price"];
    $total = $price * $quantity;
    require_once("server.php");
    $link = create_connection();

    $sql = "UPDATE `shoppingcar` SET `quantity`='$quantity',`total`= '$total' WHERE `username`='$username' AND `productno`=$product_no ";

    execute_sql($link,"test1",$sql);
    mysqli_close($link);
    header("location:shopping_car.php");
?>