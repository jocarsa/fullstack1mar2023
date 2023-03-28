var url = ".."
var usuario = ""
var destino = ""

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
        document.getElementById("usuarios").innerHTML += '<article class="usuario"><div class="foto">'+resultado[i].nombre[0]+'</div><h3 usuario="'+resultado[i].usuario+'">'+resultado[i].nombre+' '+resultado[i].apellidos+'</h3><div>'
    }
    // Cuando haga click en los usuarios de la pantalla principal
    document.getElementById("usuarios").addEventListener("click",function(){
        // En primer lugar oculto la lista de usuarios
        document.getElementById("usuarios").style.display = "none"
        // Porque a continuación muestro la conversación
        document.getElementById("conversacion").style.display = "block"
    })
    var listausuarios = document.getElementsByTagName("h3")
    console.log(listausuarios)
    for(var i = 0;i<listausuarios.length;i++){
        listausuarios[i].addEventListener("click",function(e){
            console.log("Has hecho click en un usuario")
            var usuariodestino = this.getAttribute("usuario")
            console.log("el usuario es:"+usuariodestino)
            destino = usuariodestino
        })
    }
    
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
    fetch(url+'/servidor/escribemensaje.php?mensaje='+mensaje+"&usuario="+usuario+"&destino="+destino)
}
// Creo un temporizador, y ejecuto el bucle dentro de un segundo
var temporizador = setTimeout("bucle()",1000)

function bucle(){
    fetch(url+'/servidor/listamensajes.php?origen='+usuario+'&destino='+destino)
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
// Acción a ejecutar cuando hago click sobre el boton de login
document.getElementById("botonlogin").addEventListener("click",function(){
    // Asigno el campo usuario a una variable temporal
    usuariotemp = document.getElementById("usuario").value
    // Asigno el campo contraseña a una variable temporal
    contrasenatemp = document.getElementById("contrasena").value
    console.log("vamos")
    cadena=  '/servidor/login.php?usuario='+usuariotemp+'&contrasena='+contrasenatemp
    console.log(cadena)
    // Lanzo una petición contra el servidor y espero su respuesta
    fetch(url+cadena)
    .then(resultado => resultado.json())
    .then(resultado => compruebaLogin(resultado));
    
    
})

function compruebaLogin(resultado){
    console.log("el servidor ha dicho:")
    console.log(resultado)
    // De momento no pasas
    pasas = false
    // Reviso los resultados que me da el servidor
    for(var i = 0;i<resultado.length;i++){
        // Solo en el caso de que exista el usaurio
        if(resultado[i].usuario){
            // Le doy nombre de usuario
            usuario = resultado[i].usuario
            // Te digo que puedes pasar
            pasas = true
        }
    }
    // Si puedes pasar
    if(pasas == true){
        // Oculto la ventana de login
        document.getElementById("login").style.display = "none"
        // Muestro la ventana de los usuarios
        document.getElementById("usuarios").style.display = "block"
    }else{
        // En caso de que no puedas pasar te muestro un mensaje de error
        document.getElementById("resultado").innerHTML = "usuario incorrecto"
    }
    
}

document.getElementById("atras").addEventListener("click",function(){
    document.getElementById("conversacion").style.display = "none"
    document.getElementById("usuarios").style.display = "block"
})







