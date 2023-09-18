<?php

include ('../modelo/mascota.php');


$mascota = new mascotas("", "", ""); 

if (isset($_POST['nombre']) && isset($_POST['raza'])) {
    $mascota->guardar();
}


if (isset($_POST['id'])) {
    $mascota->eliminar();
}





?>