<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>歡迎</h1>
    <?php    
        if(isset($_POST["Username"])){

            require_once('server.php');

            $link = create_connection();

            $username = $_POST["Username"];
            $password = $_POST["Password"];
            $sql = "SELECT * FROM users WHERE account = '$username' AND passwd ='$password'";

            $result = execute_sql($link,"test1",$sql);

            if(mysqli_num_rows($result) == 0){
                mysqli_free_result($result);

                mysqli_close($link);

                echo "<script type='text/javascript'>alert('帳號密碼錯誤，請查明後再登入')</script>";
            }else{
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                mysqli_close($link);
                header("location:index.html");
            }
        }
        
        
    ?>
    <form action="login.php" method="post">
        <table class="login">
            <tr>
                <td>
                    使用者名稱:
                </td>
                <td>
                    <input type="text" name="Username" size="15" maxlength="10">
                </td>
            </tr>
            <tr>
                <td>
                    使用者密碼:
                </td>
                <td>
                    <input type="password" name="Password" size="15" maxlength="10">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="登入網站">
                </td>
            </tr>
        </table>   
    </form>
</body>
</html>