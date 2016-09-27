<?php
// Conexion a la base de datos
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("bies") or die(mysql_error());

if ($_GET['id'] > 0)
{
    // Consulta de búsqueda de la imagen.
    $consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE imagen_id={$_GET['id']}";
    $resultado = @mysql_query($consulta) or die(mysql_error());
    $datos = mysql_fetch_assoc($resultado);

    $imagen = $datos['imagen']; // Datos binarios de la imagen.
    $tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
    // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    header("Content-type: $tipo");
    // A continuación enviamos el contenido binario de la imagen.
    echo $imagen;
}
?>
