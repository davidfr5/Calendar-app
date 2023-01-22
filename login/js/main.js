
document.addEventListener("DOMContentLoaded", () => {
    var fecha=document.querySelector(".trValor > td:last-child").attributes.rel.value;
    var myArray = fecha.split("-");
    var num1= parseInt(myArray[1]);
    var num2=parseInt(myArray[0]);
    
    

    document.getElementById("botonIzq").addEventListener("click", function(){
   
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState==4 && this.status==200) {
          document.querySelector("#calendar").innerHTML="";
          document.querySelector("#calendar").innerHTML=this.response;
          createCalendar(num1,num2);
      }
      };
      xhttp.open("GET", "./prueba2.php", true);
      xhttp.send();
      

        
    });


document.getElementById("botonDer").addEventListener("click", function(){
    num1=num1+1;
    if(num1>12){num1=1;num2++;}
    createCalendar(num1, num2);
    
});

function createCalendar(num1, num2){
     
    num1 = num1-1;
    if(num1<1){num1=12;num2--;}
    
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState==4 && this.status==200) {
    document.querySelector("#calendar").innerHTML="";
    document.querySelector("#calendar").innerHTML=this.response;
}
};

}
});