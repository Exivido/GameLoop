// Game Variables

let blockSize=4;
let rts=0;
let board = document.getElementById("box");
let gameOver=false;

//food variables
let foodX=5;
let foodY=5;
let food;


//move variables
let velocityX=0;
let velocityY=0;

//Snake Variables 
let snake;
let snakeBody=[];
let snakeX=0;
let snakeY=0;



//OnLoad Events
window.onload=function(){
    creatSnake();
    placeFood();
    foodReplace();
    setInterval(update,150);
    if(window.localStorage)
    {
        if(!localStorage.getItem('firstLoad'))
        {
            localStorage['firstLoad']=true;
            window.location.reload();
        }
        else{
            localStorage.removeItem('firstLoad');
        }
    }
}




//update Function


function update(){

    //Game Over Check


    if(gameOver==true)
    {
        gameOver=false;
        

        var conf = confirm("You Lose!\n Continue???");
        if(conf){
            location.reload();
                }
        else{
            alert("Ok \n See Ya Next Time!");
            window.close();
            
        }
        return;
    }
    else
    {


    //Eat Food condition
    if(snakeX==foodX&&snakeY==foodY)
    { document.getElementById("rts").innerHTML=++rts;
      updaterts();
      creatSnake(food);
      foodReplace();
    }
    //Main Update Codes
    for(let i = 0;i<snakeBody.length-1;i++){
        snakeBody[i].style.left=getComputedStyle(snakeBody[i+1]).left;
        snakeBody[i].style.top=getComputedStyle(snakeBody[i+1]).top;
    }
    } 

    


    //Game Over conditions
    if(snakeX>19*blockSize||snakeX<0||snakeY>19*blockSize||snakeY<0)
    {
        gameOver=true;
        saveInDataBase();
    }
    snakeMove();

    for(i=0;i<snakeBody.length-1;i++)
    {
        if(getComputedStyle(snake).left==getComputedStyle(snakeBody[i]).left&&getComputedStyle(snake).top==getComputedStyle(snakeBody[i]).top)
        {
            gameOver=true;
            saveInDataBase();
        }
    }
    


}

//creat Snake 


function creatSnake(foodOBJ){
   
    if(snakeBody.length==0){
        snake=document.createElement("div");
        snake.className="snake";
        snake.style.width=blockSize+"vmin";
        snake.style.height=blockSize+"vmin";
        board.append(snake);
        snakeBody[0]=snake;

        
    }
    else
    {
        snake=document.createElement("div");
        snake.className="snake";
        snake.style.width=blockSize+"vmin";
        snake.style.height=blockSize+"vmin";
        snake.style.left=(window.getComputedStyle(foodOBJ).left);
        snake.style.top=(window.getComputedStyle(foodOBJ).top);
        board.append(snake);
        snakeBody.push(snake);
    }

   
}




//move Function
function snakeMove(){
    if(gameOver)
    {
        return;
    }
    snakeX+=velocityX*blockSize;
    snakeY+=velocityY*blockSize;
    snake.style.left=(snakeX+"vmin");
    snake.style.top=(snakeY+"vmin");
    



}





//Change Direction Function
document.addEventListener("keyup",changeDirection) 
function changeDirection(e){
    if(e.code=="ArrowUp" && velocityY!=1){
        velocityX = 0 ;
        velocityY = -1;
    }
    else if(e.code=="ArrowDown" && velocityY!=-1)
    {
        velocityX = 0 ;
        velocityY = 1;
    }  
    else if(e.code=="ArrowLeft"&& velocityX!=1)
    {
        velocityX = -1 ;
        velocityY = 0;
    }
    else if(e.code=="ArrowRight"&& velocityX!=-1)
    {
        velocityX = 1  ;
        velocityY = 0;
    }
}


//Place Food
 function placeFood(){
    food=document.getElementById("food");
    food.style.width=blockSize+"vmin";
    food.style.height=blockSize+"vmin";

 }


//Food Random Replace

function foodReplace(){
    foodX=Math.floor((Math.random()*18)+1)*blockSize;
    foodY=Math.floor((Math.random()*18)+1)*blockSize;
    food.style.left=foodX+"vmin";
    food.style.top=foodY+"vmin";
}




