
///////////////////////////        paralax    //////////////////////////
let bg=document.querySelector(".bg");
let bgX=bg.offsetLeft;
let bgY=bg.offsetTop;
let slider=document.querySelector(".slider");
let sliderWidth=slider.offsetWidth;
let sliderHeight=slider.offsetHeight;
let movement=40;
let mouseX;
let mouseY;
let bgWidth = bg.offsetWidth;
let bgHeight = bg.offsetHeight;
let counter=0;
function paralax(e){

    if(e.clientX>=bgWidth/2)
    {
        mouseX=(e.clientX-(sliderWidth/2)-movement);
    }
    else if(e.clientX<bgWidth/2)
    {
        mouseX=(e.clientX-((sliderWidth/2)+movement));
    }
    if(e.clientY>=bgHeight/2)
    {
        mouseY=(e.clientY-(sliderHeight/2)-movement);
    }
    else if(e.clientY<bgHeight/2)
    {
        mouseY=(e.clientY-((sliderHeight/2)+movement));
    }
    let translateX=-(mouseX/11);
    let translateY=-(mouseY/11);
    bg.style.transform="translate("+translateX+"px,"+translateY+"px)";
}
