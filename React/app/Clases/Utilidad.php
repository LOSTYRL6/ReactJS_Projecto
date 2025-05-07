<?php
Namespace App\Clases;

class Utilidad{
    public static function errorMensaje($e, $type = null){
    if (!empty($e->errorInfo[1])) {
        switch ($e->errorInfo[1]) {
            case 1062:
                $mensaje = "Codigo duplicado";
                break;
            case 1451:
                $mensaje = "Elementos Relacionados";
                break;
            default:
                $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                break;
        }
    } else {
        switch ($e->getCode()) {
            case 1044:
                $mensaje = "Usuario o password incorrecto";
                break;
            case 1049:
                $mensaje = "Base de datos no encontrada";
                break;
            case 2002:
                $mensaje = "Servidor no encontrado";
                break;
            default:
                $mensaje = $e->getCode() . ' - ' . $e->getMessage();
                break;
        }
    }
    return $mensaje;
}
}

