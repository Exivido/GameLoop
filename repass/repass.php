<?php
if(isset($_POST['username']))
{
    $error=false;
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $repass=$_POST['repassword'];
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'gameloop');
    $sql="update players set password = '$pass' where players.uname='$name'";
    if($name==""||$pass==""||$repass=="")
    {
        echo "<script>alert('fields can not be empty!!!');</script>";
        $error=true;
    
    }else if ($pass!=$repass)
    {
        echo"<script>alert('passwords must be same!');</script>";
        $error=true;
    
    }
    if($error==false){
        mysqli_query($con,$sql);
        echo "<script>alert('your password has changed successfuly! your new password is : \n $pass');</script>";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="repass.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <p class="header"> Reset Password</p>
        <form action="repass.php" method="post">
            <div class="un-container">
                <div class="username">Username</div>
                <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="username"
                    placeholder="Type your username">
            </div>
            <div class="pw-container">
                <div class="username">New Password</div>
                <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input type="password" name="password"
                    placeholder="Type your Password">
            </div>
            <div class="pw-container">
                <div class="username">repeat Password</div>
                <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input type="password" name="repassword"
                    placeholder="Type your Password">
            </div>

            <input type="submit" value="Change Password" id="login">
            <a class="creat-text" href="../login/login.php">LOGIN</a>
        </form>

    </div>
</body>

</html>