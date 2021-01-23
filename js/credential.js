
function errorLogin(){
const loginMsg=document.getElementById("errormsg");
loginMsg.innerHTML="<p>Invalid Credentials</p>"
loginMsg.setAttribute("style","color:red; font-size: 16px; font-weight: 400; height:0px;text-align: center;");
document.getElementById("username").style.borderColor="red";
document.getElementById("password").style.borderColor="red";


setTimeout(function () {
    loginMsg.style.display='none';
    document.getElementById("username").style.borderColor="rgb(41, 41, 44)";
    document.getElementById("password").style.borderColor="rgb(41, 41, 44)";
}, 3000);
}
