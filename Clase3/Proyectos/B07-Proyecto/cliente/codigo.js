var url = ".."
var usuario = ""

// Realizo una peticion a la lista de usuarios y la obtengo en JSON
fetch(url+'/servidor/listausuarios.php')
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
    enviaMensaje()
})

document.addEventListener('keypress', function (e) {
    console.log(e)
    if (e.key === 'Enter') {
        enviaMensaje()
    }
});
function enviaMensaje(){
    // Atrapo el contenido del input
    mensaje = document.getElementById("mensaje").value
    // Lo saco por consola
    console.log("vas a enviar el mensaje: "+mensaje)
    // Vacío el contenido del input
    document.getElementById("mensaje").value = ""
    // Envio el mensaje al servidor
    fetch(url+'/servidor/escribemensaje.php?mensaje='+mensaje+"&usuario="+usuario)
}
// Creo un temporizador, y ejecuto el bucle dentro de un segundo
var temporizador = setTimeout("bucle()",1000)

function bucle(){
    fetch(url+'/servidor/listamensajes.php')
        .then(resultado => resultado.json())
        .then(resultado => dameMensajes(resultado));
    
    // Elimino el temporizador actual
    clearTimeout(temporizador)
    // Y creo un nuevo temporizador
    temporizador = setTimeout("bucle()",1000)
    
}

function dameMensajes(resultado){
    console.log(resultado)
    // Para cada uno de los resultados (ya que es un array)
    document.getElementById("mensajes").innerHTML = ""
    for(var i = 0;i<resultado.length;i++){
        var epoch = resultado[i].momento;
        var d = new Date(0); // The 0 there is the key, which sets the date to the epoch
        d.setUTCSeconds(epoch);
        var anio = d.getFullYear()
        var mes = d.getMonth()
        var dia = d.getDay()
        var hora = d.getHours()
        var minuto = d.getMinutes()
        var segundo = d.getSeconds()
        fecha = anio+"/"+mes+"/"+dia+" "+hora+":"+minuto+":"+segundo
        // En la seccion con id mensajes, pongo el mensaje
        document.getElementById("mensajes").innerHTML += '<div class="mensaje yo"><div class="nombreusuario">'+resultado[i].usuarioemisor+'</div><div class="momento">'+fecha+'</div>'+resultado[i].mensaje+'</div>'
    }
    console.log(document.getElementById("nuevomensaje").clientTop)
        document.getElementById("mensajes").scrollTop =  10000

    
}

document.getElementById("botonlogin").addEventListener("click",function(){
    // En primer lugar oculto la lista de usuarios
        document.getElementById("login").style.display = "none"
        // Porque a continuación muestro la conversación
        document.getElementById("usuarios").style.display = "block"
    usuario = document.getElementById("usuario").value
})









