<?php
require_once '../clases/ConexionEstatica.php';
ConexionEstatica::AbrirConexion();
//$_FILES['valor del atributo']['Atributo']; Forma de sacar los valores
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        $tipo = $_FILES['imagen']['type'];
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        $no = $_FILES['nombre']['value'];
        $des=$_FILES['decripcion']['value'];
        $plat=$_FILES['Plataforma']['value'];
        $FSalida=$_FILES['Fecha_Salida']['value'];
        $EMinima=$_FILES['Edad_Minima']['value'];
        ConexionEstatica::InsertarJuego($data, $no, $des, $plat, $FSalida, $EMinima);       
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
ConexionEstatica::cerrarConexion();

