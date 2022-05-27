<?php
    $product_no = $_GET["productno"];
    $product_name = $_GET["productname"];
    $price = $_GET["price"];
    $count = $_GET["count"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改商品</title>
</head>
<body>
    <table style="margin:auto">
        <form method="post" action="edit1.php?productno=<?php echo $product_no?>">
            <tr><td>商品編號:<?php echo $product_no;?></td></tr>
            <tr><td>商品名稱:<input type="text" name="productname" value="<?php echo $product_name?>"></td></tr>    
            <tr><td>商品價格:<input type="text" name="price" value="<?php echo $price?>"></td></tr>
            <tr><td>商品數量:<input type="text" name="count" value="<?php echo $count?>"></td></tr>
            <tr>
                <td><input type="submit" value="上傳">
                <input type="reset" value="重新上傳"></td>
            </tr>           
        </form>
    </table>
    
</body>
</html>