<?php

session_start();
$error=false;
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'gameloop');
$name=$_POST['username'];
$pass=$_POST['password'];
$repass=$_POST['repassword'];
echo "<div class='login'>";
if($name==""||$pass==""||$repass==""){
    echo "<p class = 'success'>Fields Can not Be Empty!!!</p>";
    $error=true;
}
else if($pass!=$repass)
{
    echo "<p class = 'error'>Ooops! Your Passwords Are Not Match</p>";
    $error=true;

}
if($error==false)
{
$s="select * from players where uname='$name'";
$result=mysqli_query($con,$s);
$number=mysqli_num_rows($result);
if($number==1){
    echo "<p class = 'error'>UserName Already Exist</p>";
}
else
{
    $reg="insert into players (uname,password,score) values ('$name','$pass',0)";
    mysqli_query($con,$reg);
    echo "<p class = 'success'>Registration was Successful!</p>";
    echo "<h6 class = 'success'>UserName : '$name'</h6>";
    echo "<h6 class = 'success'>Password : '$pass'</h6>";

}
}
echo "</div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body{
            background-image: url("img/1.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
        }
        div{
            background-color:white;
            width: 390px;
            height: 390px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            border-radius:10px;
            font-size:25px;
        }
        p{
            text-align:center;
            margin-top:50%;
        }
        .error{
            color:red;

        }
        .success{
            color:green;
        }
        h6{
            text-align:center;
        }
    </style>
   
</head>
<body>
    
</body>
</html>