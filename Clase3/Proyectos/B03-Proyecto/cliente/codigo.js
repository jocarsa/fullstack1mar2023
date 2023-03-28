// Realizo una peticion a la lista de usuarios y la obtengo en JSON
fetch('../servidor/listausuarios.php')
    .then(resultado => resultado.json())
    .then(resultado => dameUsuarios(resultado));
// Defino la funcion dameusuarios
function dameUsuarios(resultado){
    // saco los resultados por consola
    console.log(resultado)
    // Para cada uno de los resultados (ya que es un array)
    for(var i = 0;i<resultado.length;i++){
        // En la seccion con id usuarios, pongo el nombre de usuario
        document.getElementById("usuarios").innerHTML += '<article class="usuario"><div class="foto">'+resultado[i].nombre[0]+'</div><h3>'+resultado[i].nombre+' '+resultado[i].apellidos+'</h3><div>'
    }
    // Cuando haga click en los usuarios de la pantalla principal
    document.getElementById("usuarios").addEventListener("click",function(){
        // En primer lugar oculto la lista de usuarios
        document.getElementById("usuarios").style.display = "none"
        // Porque a continuación muestro la conversación
        document.getElementById("conversacion").style.display = "block"
    })
    
}
document.getElementById("enviamensaje").addEventListener("click",function(){
    // Compruebo que estoy atrapando el evento
    console.log("Has hecho click en el boton")
    // Atrapo el contenido del input
    mensaje = document.getElementById("mensaje").value
    // Lo saco por consola
    console.log("vas a enviar el mensaje: "+mensaje)
    // Vacío el contenido del input
    document.getElementById("mensaje").value = ""
    // Envio el mensaje al servidor
    fetch('../servidor/escribemensaje.php?mensaje='+mensaje)
})
