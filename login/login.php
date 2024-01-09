<?php
session_start();
if(isset($_POST['register']))
{
    $error=false;
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'gameloop');
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $repass=$_POST['repassword'];
    if($name==""||$pass==""||$repass==""){
        echo "<script>alert('Fields can not be empty!!!!');</script>";
        $error=true;
    }
    else if($pass!=$repass)
    {
        echo "<script>alert('Passwords Must Be same');</script>";
        $error=true;

    }
    if($error==false)
    {
    $s="select * from players where uname='$name'";
    $result=mysqli_query($con,$s);
    $number=mysqli_num_rows($result);
    if($number==1){
        echo "<script>alert('Username Already Exist!!!');</script>";
    }
    else
    {
        $reg="insert into players (uname,password,score) values ('$name','$pass',0)";
        mysqli_query($con,$reg);
        echo "<script>alert('Your Account is Created! \n Username:$name \n Password:$pass');</script>";
        header('location:../main/main.php');
        $_SESSION['userName']=$name;


    }
    }

}






if(isset($_POST['login']))
{
    $error=false;
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'gameloop');
    if($name==""||$pass==""){
        echo "<script> alert('fields can not be empty!!!')</script>";
        $error=true;
    }
    $sql="Select * from players where uname = '$name' && password = '$pass'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($error==false){
    if($num==1){
        $_SESSION['userName']=$name;
        header('location:../main/main.php');
    }
    else
    {
        echo "<script> alert('wrong user name or password!!!')</script>";
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<html>

<body>
    <div class="flip-card">
        <div class="inner-card">
            <div class="login">
                <p class="header"> Login</p>
                <form action="login.php" method="post">
                    <div class="un-container">
                        <div class="username">Username</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="username"
                            placeholder="Type your username">
                    </div>
                    <div class="pw-container">
                        <div class="username">Password</div>
                        <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input type="password" name="password"
                            placeholder="Type your Password"><i onclick="showPassLogin(this)" class="fa fa-eye"></i>
                    </div>
                    <a class="forgot-pass" href="#" onclick="forgotpass()">Forgot Password?</a>
                    <input type="submit" value="LOGIN" id="login" name="login">
                </form>
                <p class="creat-text">
                    dont Have Account?
                </p>
                <a href="#" class="creat-account" onclick="flip()"> Creat Account</a>
            </div>
            <div class="sign-up">
                <p class="header"> Sign Up</p>
                <form action="login.php" method="post">
                    <div class="un-container">
                        <div class="username">Username</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="username"
                            placeholder="Type your username">
                    </div>
                    <div class="pw-container">
                        <div class="username">Password</div>
                        <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input class="password" type="password"
                            name="password" placeholder="Type your Password"><i onclick="showPassRegister(this)"
                            class="fa fa-eye"></i>
                    </div>
                    <div class="pw-container">
                        <div class="username">repeat Password</div>
                        <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input class="password" type="password"
                            name="repassword" placeholder="Type your Password">
                    </div>

                    <input type="submit" value="creataccount" id="sign-up" name="register">

                </form>
                <p class="creat-text">
                    already Have Account?
                </p>
                <a href="#" class="creat-account" onclick="flipBack()"> LOGIN</a>
            </div>
        </div>
    </div>

</body>

</html>