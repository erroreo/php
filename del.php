<?php
    $product_no = $_GET["productno"];
    require_once("server.php");
    $link = create_connection();
    $sql = "DELETE FROM product WHERE productno=$product_no";
    execute_sql($link,"test1",$sql);
    $sql1 = "SELECT * FROM `shoppingcar`";
    $result = execute_sql($link,"test1",$sql1);
    $total_records = mysqli_num_rows($result);
    $row = array();
    if($total_records !== 0){
        for($i = 0; $i < $total_records; $i++){
            $rows = mysqli_fetch_assoc($result);
            array_push($row,$rows["productno"]);
        }
        $key = array_search($product_no,$row);
        var_dump($key);
        if($key !== false || $key == 0){
            $sql2 = "DELETE FROM `shoppingcar` WHERE `productno`=$product_no";
            execute_sql($link,"test1",$sql2);
        }
    }
    
    mysqli_close($link);
    header("location:catalog.php");
?>