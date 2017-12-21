<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass_hash= md5($password);
        $sql = mysql_query("SELECT email, password FROM users WHERE email='$username' AND password='$pass_hash'");
        if($sql){
                //echo "hello";
            $res = mysql_query("SELECT `status` FROM `users` WHERE email='$username' AND password='$pass_hash'");
            while($row= mysql_fetch_array($res)){
                $status = $row['status'];
            }
                if($status == 1){
                    $_SESSION['user'] = $username;    
                    header('location:index.php');    
                }else{
                    $error = 'You are Temporarily Blocked Please Contact with Admin';     
                }       
                
        }else{
            $error = 'Check Username and Password';
        }
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        
        </title>
    </head>
<body>
    <div style="color:red;"><?php if(isset($error)){ echo $error;} ?></div>
    <form action="" method="post">
        <div>
            <label>Username
                <input type="text" name="username" required>
            </label>
        </div>
        <div>
            <label>Password
                <input type="password" name="password"  required>
            </label>
        </div>
        <div>
            <input type="submit" name="submit" value="Login">
        </div>        
    </form>
</body>
</html>