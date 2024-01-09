var upBlock = document.querySelector(".up-block");
var downBlock = document.querySelector(".down-block");
var bird = document.querySelector(".bird");
var jumping = 0;
var rts = 0;
var box=document.querySelector('#box');
var pause=true;

upBlock.addEventListener('animationiteration', () => {
    var random =((Math.random()*45)+5);
    upBlock.style.height = random + "vmin";
    downBlock.style.height=(80-random-26)+"vmin";
    rts++;
    document.querySelector("#rts").innerHTML=rts;
    updaterts();
});


setInterval(function(){
    if(!pause)
    {
        var birdTop=bird.offsetTop;
        if(jumping==0)
        {
            bird.style.top=(birdTop+2)+"px";
    
        }
        //lose when hit the pipes
        if((upBlock.offsetLeft<=(bird.offsetWidth+bird.offsetLeft))&&(bird.offsetTop<upBlock.offsetHeight||(bird.offsetTop+bird.offsetHeight)>downBlock.offsetTop))
        {
            pause=true;
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
    }
},10);

function jump(){
    document.querySelector(".c2play").style.display="none";
    pause=false;
    upBlock.style.animationPlayState="running";
    downBlock.style.animationPlayState="running";

    jumping = 1;
    let jumpCount = 0;
    var jumpInterval = setInterval(function(){
        var birdTop = parseInt(window.getComputedStyle(bird).getPropertyValue("top"));
        if((birdTop>6)&&(jumpCount<15)){
            bird.style.top = (birdTop-4)+"px";
        }
        if(jumpCount>20){
            clearInterval(jumpInterval);
            jumping=0;
            jumpCount=0;
        }
        jumpCount++;
    },10);
}