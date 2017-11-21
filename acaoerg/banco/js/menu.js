tms=new Array()

//Mostra o submenu no mouseover
function over(n){
    if(typeof(tms[n])!="undefined")clearTimeout(tms[n])
    document.getElementById("item"+n).style.visibility="visible"
}
//Esconde o submenu no mouseout
function out(n){
    tms[n]=setTimeout('document.getElementById("item'+n+'").style.visibility="hidden"',500)
}	  
