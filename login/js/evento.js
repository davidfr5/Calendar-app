document.addEventListener("DOMContentLoaded", () => {
   
function abrirEvento() {
    console.log( "Ejecutando función test()" );
    window.open("../crearEvento.html" , "ventana1" , "width=120,height=300,scrollbars=NO")
}
abrirEvento();
});