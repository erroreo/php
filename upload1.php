<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳商品</title>
</head>
<body>
    <?php  
        
        if(isset($_POST["productno"])){
            require_once("server.php");
            $link = create_connection();
            $product_no = $_POST["productno"];
            $product_name = $_POST["productname"];
            $count = $_POST["count"];
            $price = $_POST["price"];
            $sql1 = "SELECT * FROM `product` WHERE productno = $product_no";
            $result = execute_sql($link,"test1",$sql1);
            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO product(productno, price, count, productname) VALUES ('$product_no','$price','$count','$product_name')";
                execute_sql($link,"test1",$sql);
                header("location:catalog.php");
            }else{
                echo "<script type='text/javascript'>alert('產品編號重複')</script>";
            }
            mysqli_close($link);
        }
    ?>
    <form method="post" action="upload1.php" style="text-align:center;">
        商品編號:<input type="text" name="productno"><br>
        商品名稱:<input type="text" name="productname"><br>
        商品數量:<input type="text" name="count"><br>
        商品價格:<input type="text" name="price"><br>
        <input type="submit" value="上傳">
        <input type="reset" value="清除">
    </form>
</body>
</html>