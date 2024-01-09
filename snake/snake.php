<?php
session_start();
$name="defait Name";
$score=0;
$rts=0;
$name=$_SESSION['userName'];
$conn=mysqli_connect('localhost','root','');
 mysqli_select_db($conn,'gameloop');

$sql = "select score from players where uname = '$name'";
$result = $conn->query($sql);
setcookie("rts",0);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $score=$row["score"];
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="snake.css">
    <script src="snake.js" defer>
    </script>
    <script>
         function updaterts(){
            document.cookie="rts="+rts;
           
              let score=document.getElementById("highest");
              if(parseInt(score.innerHTML)<=rts)
              {
                score.innerHTML=rts.toString();
              }
              <?php
              $rts=$_COOKIE["rts"];
              if($score<=$rts)
              {
                $updateScore="update players set score = $rts where players.uname='$name' ";
                mysqli_query($conn,$updateScore);
                $sql = "select score from players where uname = '$name'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $score=$row["score"];
                         }
                    }   
              }
              ?>

        }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake</title>
</head>
<body>
    <div class="container">
        <p class="txt">S<i class="fa-solid fa-worm"></i>ake Game </p>
        <div class="shapes">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

        </div>
    </div>
    <div class="main">
        <div class="left">
            <h1>
                <?php echo "$name"?>
            </h1>
            <p>
            ↓ Your Score ↓ 
            </p>
            <h2 id="rts">
                0
            </h2>
            <p>
            ↓ Your Highest Score is ↓ 
            </p>
            <h2 id="highest">
                <?php echo "$score"?>

            </h2>
            <a href="../login/login.php">
                Log Out
            </a>

        </div>
        <div id="box">
            <i id="food" class="fa-solid fa-apple-whole"></i>
        </div>
        <div class="right">
            <h1>
                Ranking
            </h1></br></br>
            
            <div class="rankcontainer">
            <div class="leftofright">
            <h2><i class="fa-solid fa-trophy" id="fst"></i> &nbsp 1 st   :&nbsp </h2></br></br>
            <h2><i class="fa-solid fa-trophy" id="snd"></i>&nbsp 2 nd :&nbsp </h2></br></br>
            <h2><i class="fa-solid fa-trophy" id="trd"></i>&nbsp 3 rd  :&nbsp </h2></br></br>
            </div>
            <div class="rightofright">
            <?php
            $rank="select uname,score from players order by score desc limit 3";
            $rankresult=$conn->query($rank);
            if ($rankresult->num_rows > 0) {
                // output data of each row
                while($row = $rankresult->fetch_assoc()) {
                  echo "<h2>".$row["uname"]."</h2><h2> &nbsp : &nbsp ".$row["score"]."</h2></br></br></br>";
                }
              }
            ?>
            </div>
            </div>
            
        </div>
    </div>
    
</body>
</html>