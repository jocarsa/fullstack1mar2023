<?php include "inc/cabecera.php";?>
<h3>Datos del cliente</h3>
<form action="procesapedido.php" method="POST">
    <h5>Selecciona un nombre de usuario</h5>
    <input type="text" name="usuario">
    <h5>Selecciona una contraseña</h5>
    <input type="text" name="contrasena">
    <h5>Indica tu nombre completo</h5>
    <input type="text" name="nombre">
    <h5>Indica tus apellidos</h5>
    <input type="text" name="apellidos">
    <h5>Indica tu correo electrónico</h5>
    <input type="email" name="email">
    <h5>Indica tu DNI/VAT</h5>
    <input type="text" name="vat">
    <h5>Indica tu dirección</h5>
    <input type="text" name="direccion">
    <h5>Indica tu localidad</h5>
    <input type="text" name="localidad">
    <h5>Indica tu código postal</h5>
    <input type="text" name="cp">
    <h5>Indica tu pais</h5>
    <input type="text" name="pais">
    <input type="submit">
</form>
<?php include "inc/piedepagina.php";?>