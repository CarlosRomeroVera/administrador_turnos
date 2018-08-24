var envio = "";
var envioTmp = "";
var turno = '';

function info(elEvento) {
    //alert(elEvento.keyCode);    
    //texto = document.getElementById("users").value;
    texto = document.getElementById("clicks");       
    if (elEvento.keyCode == 13 || elEvento.keyCode == 54) {
       i++;
      document.getElementById("clicks").innerHTML = i;
      envio = i;
      transition();
    }
    if (elEvento.keyCode == 32 || elEvento.keyCode == 52) {
       i--;
       document.getElementById("clicks").innerHTML = i;
       envio = i;
       transition();
    }

    //showUser(envio);
}

window.onload = function() { //acceso a los eventos.
    document.onkeypress = info;
    
}

$( document ).ready(function() {
    setInterval(function(){ 
        $.ajax({
          type: "POST",
          url:        window.server + "obtiene_turno.php",
          data: ({
                  
              }),
          dataType:   "html",
          async: false,
          success:    function(data){
            //texto = document.getElementById("clicks"); 
            if (data != turno) {
              turno = data;
              document.getElementById("clicks").innerHTML = data;
              transition();
            }
            
          }
        });//cierre de ajax
     }, 3000);

});

