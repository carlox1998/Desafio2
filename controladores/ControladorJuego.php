<?php

require_once '../clases/ConexionEstatica.php';
ConexionEstatica::AbrirConexion();

//$_FILES['valor del atributo']['Atributo']; Forma de sacar los valores
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    $permitidos = array("image/jpg", "image/jpeg");
    $limite_kb = 16384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        //foreach($_POST AS $key => $value) { $_POST[$key] =ConexionEstatica::$conexion->real_escape_string($value); }
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        $tipo = $_FILES['imagen']['type'];
        //$fp = fopen($imagen_temporal, 'r+b');
        //$data = fread($fp, filesize($imagen_temporal));
        //fclose($fp);
        //$data = file_get_contents($imagen_temporal);
        //$data = file_get_contents($_FILES['imagen']['tmp_name']);
        //$data = ConexionEstatica::$conexion->real_escape_string($data);


        //$data = $_FILES["imagen"]["tmp_name"];
        $data = $_FILES["imagen"]["tmp_name"];
        $nombrefoto = $_FILES["imagen"]["name"];
        //este es el archivo que añadiremosal campo blob
        $data = $_FILES['imagen']['tmp_name'];
        //lo comvertimos en binario antes de guardarlo
        $data = ConexionEstatica::$conexion->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));



        $no = $_REQUEST['nombre'];
        $des = $_REQUEST['decripcion'];
        $plat = $_REQUEST['Plataforma'];
        $FSalida = $_REQUEST['Fecha_Salida'];
        $EMinima = $_REQUEST['Edad_Minima'];
        ConexionEstatica::InsertarJuego($data, $tipo, $no, $des, $plat, $FSalida, $EMinima);
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
header("location:../index.php");
ConexionEstatica::cerrarConexion();
/*
// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL)) {
    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg")) {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = $_SERVER['DOCUMENT_ROOT'] . 'TemaPHP/intranet/uploads/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
        $no = $_REQUEST['nombre'];
        $des = $_REQUEST['decripcion'];
        $plat = $_REQUEST['Plataforma'];
        $FSalida = $_REQUEST['Fecha_Salida'];
        $EMinima = $_REQUEST['Edad_Minima'];
        // Lo subimos a la base de datos
        ConexionEstatica::InsertarJuego($nombre_img, $no, $des, $plat, $FSalida, $EMinima);
    } else {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }
} else {
    //si existe la variable pero se pasa del tamaño permitido
    if ($nombre_img == !NULL)
        echo "La imagen es demasiado grande ";
}
header("location:../index.php");
 ConexionEstatica::cerrarConexion();
*/
