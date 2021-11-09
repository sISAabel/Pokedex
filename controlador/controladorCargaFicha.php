<?php
ob_start();
include  "../vista/formulario/formulario.php";
$formulario =  ob_get_clean();
echo $formulario;
