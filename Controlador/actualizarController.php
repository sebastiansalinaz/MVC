<?php

include ('../modelo/mascota.php');

$mascota = new mascotas("", "", ""); 

if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['raza'])) {
    $mascota->actualizar();
}
?>