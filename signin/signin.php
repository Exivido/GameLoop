<?php

// session_start();
// if(isset($_POST['username']))
// {
//     $error=false;
//     $name=$_POST['username'];
//     $pass=$_POST['password'];
//     $con=mysqli_connect('localhost','root','');
//     mysqli_select_db($con,'gameloop');
//     if($name==""||$pass==""){
//         echo "<script> alert('fields can not be empty!!!')</script>";
//         $error=true;
//     }
//     $sql="Select * from players where uname = '$name' && password = '$pass'";
//     $result=mysqli_query($con,$sql);
//     $num=mysqli_num_rows($result);
//     if($error==false){
//     if($num==1){
//         $_SESSION['userName']=$name;
//         header('location:main.php');
//     }
//     else
//     {
//         echo "<script> alert('wrong user name or password!!!')</script>";
//     }
//     }
// }
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
    </style>
</head>
<body>
    
</body>
</html>