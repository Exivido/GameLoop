<?php
session_start();
$name=$_SESSION['userName'];

?>
<!DOCTYPE html >
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <script src="main.js" defer></script>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2A1E80">

    <title>Document</title>
</head>
<body>
    <div class="slider"   onmousemove="paralax(event)">
        <div class="bg" ></div>
        <div class="nav">
            <div class="left"><i class="fa fa-bars"></i><span><?php echo $name;?></span></div>
            <div class="center">
                <div class="item">HOME<div class="inner-border"></div></div>
                <div class="item">FEATURES<div class="inner-border"></div></div>
                <div class="item">NEWS<div class="inner-border"></div></div>
                <div class="item">SHOP<div class="inner-border"></div></div>
                <div class="item">GALLERY<div class="inner-border"></div></div>
            </div>
            <div class="right">
                <i class="fa fa-sun"></i>
                <i class="fa fa-search"></i>
                <i class="fa fa-shopping-bag"></i>
                <i class="fa fa-sign-out-alt"></i>
            </div>
        </div>
                <!-- ///////////////////////////////// -->
                <div class="games">
                    <div class="game">
                        <img src="../img/4.jpg" alt="">
                        <h3>Snake!</h3>
                        <p>this game is fun! eat food and grow! but be careful to not eat your self or hit the wall!</p>
                        <a href="../snake/snake.php" target="blank">Play Now!</a>
                    </div>
                    <div class="game">
                        <img src="../img/bird.jpg" alt="">
                        <h3>Red Flappy Bird</h3>
                        <p>fly between the pipes! click to jump and go as far as you can! </p>
                        <a href="../flappy/flappy.php" target="blank">Play Now!</a>
                    </div>
                </div>
                <footer>
                    <div><i class="fab fa-twitter"></i><i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i><i class="fab fa-facebook"></i><i class="fab fa-telegram"></i></div>
                  <p>&#169 2023 Copyright Amir Karami & Alireza Kazemi</p>  
                </footer>
    </div>
</body>
</html>
