<?php include "inc/cabecera.php";?>
<h3>Esta es la página de contacto</h3>
<form action="procesacorreo.php" method="POST" id="formcontacto">
    <h4>Introduce tu nombre</h4>
    <input type="text" name="nombre">
    <h4>Introduce tu email</h4>
    <input type="email" name="email">
    <h4>Introduce el asunto</h4>
    <input type="text" name="asunto">
    <h4>Indica tu mensaje</h4>
    <textarea name="mensaje"></textarea>
    <input type="submit">
</form>
<?php include "inc/piedepagina.php";?>