
function flip(){

    document.querySelector(".inner-card").style.transform="rotateY(180deg)";
    setTimeout(() => {
        document.getElementById("login").style.display="none";

    }, 300);
    
}
function flipBack(){
    document.querySelector(".inner-card").style.transform="rotateY(0deg)";
    document.getElementById("login").style.display="block";

}
function showPassLogin(a){
    if(a.previousElementSibling.type=="text")
          a.previousElementSibling.type="password";
     else
          a.previousElementSibling.type="text";
}
function showPassRegister(a){
    let pass=document.getElementsByClassName("password");
    for(i=0;i<=pass.length-1;i++)
    {
        if(pass[i].type=="text")
        {
            pass[i].type="password";
        }
        else{
            pass[i].type="text";

        }
    }
}
function forgotpass(){
    window.open("../repass/repass.php");
}