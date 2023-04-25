<?php
// ------------------------------------------------ 
// // definicion de variables 
$primerSaludo = ["buenos días, gracias por comunicarte.", "como estás? Espero que bien.", "muy buenos días."];
$segundoSaludo = ["Bienvenido nuevamente.", "Un gusto saludarte de nuevo.", "como estás, nuevamente."];

// // Variables obtenidas de DDBB
$Qsaludos = 0;
$con = mysqli_connect('localhost','root','','bot');
$sql = "select * from clientes where telefono = 3517648232";
$query=mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$dir = $data[4];
$direcciones=explode(",", $dir);
$nombre = "$data[1], $data[2]"; //para pruebas con nombre cargado o no

// // variables obtenidas de API
$datos = json_decode(file_get_contents('php://input'), true);
// ------------------------------------
// $nombre = $datos['nombre']; //------ANULADO SI VIENE DE LA DDBB-----
$primerMsgConversacion = $datos['primerMensaje'];
$nuevaCalle = $datos['nuevaCalle'];
$nuevaNumeracion = $datos['nuevaNumeracion'];
$nuevaCiudad = $datos['nuevaCiudad'];
$confirmarNuevaDireccion = $datos['confirmarNuevaDireccion'];
$direccionElegida = $datos['direccionElegida'];
$confirmacionDireccionElegida = $datos['confirmacionDireccionElegida'];
$salir = $datos['salir'];
// ----------------------------------------------------


if ($salir) {
    echo json_encode(["campo" => "ingresar", "texto" => "Por favor, presiona nuevamente cualquier tecla para iniciar el chat"]);
}
if (!$salir) {
    // si no está logueado 
    if ($nombre == "") {
        echo json_encode(["campo" => "nombre", "texto" => "Hola, Necesitamos que nos indique su nombre"]);
    }

    // si está logueado 
    else {
        if (count($direcciones) == 0) {
            if ($primerMsgConversacion) {
                solicitarDireccion();
            }
        } else {
            if ($direccionElegida == "") {
                ofrecerServicio1();
            } else if (strtoupper($direccionElegida) == "N") {
                solicitarDireccion();
            } else if (strtoupper($direccionElegida) == "S") {
                echo json_encode(["campo" => "salir", "texto" => "Gracias por usar nuestro servicio. <br>Presiona cualquier tecla para iniciar el chat"]);
            } else {
                if ($confirmacionDireccionElegida == "") {
                    confirmarDireccion();
                } else if ($confirmacionDireccionElegida == "1") {
                    $texto = "Felicitaciones!! Tu pedido fue confirmado.<br>
                            Estamos buscando un movil cerca de tu zona.. En unos minutos te avisamos cuando el movil haya sido asignado";
                    echo json_encode(["campo" => "asignarMovil", "texto" => $texto]);
                } else if ($confirmacionDireccionElegida == "2") {
                    ofrecerServicio1();
                }
            }
        }
    }
}

function confirmarDireccion()
{
    global $direccionElegida, $direcciones;
    // var_dump($direcciones);
    $index = $direccionElegida - 1;
    $texto = "Seleccionaste:<br> 
        $direccionElegida - " . strtoupper($direcciones[$index]) . "<br><br>
        Por favor presiona:<br>
        1 - Para confirmar <br>
        2 - Para cambiar seleccion";

    echo json_encode(["campo" => "confirmarDireccionElegida", "texto" => $texto]);
}


function ofrecerServicio1()
{
    global $direcciones, $nombre, $primerMsgConversacion;

    if ($primerMsgConversacion) {
        $texto = saludar($nombre);
        $texto .= "Querés solicitar un movil? <br>
            Tenemos registradas las siguientes direcciones: <br>";
        foreach ($direcciones as $index => $direccion) {
            $texto .= $index + 1 . " - " . strtoupper($direccion) . "<br>";
        }
        $texto .= "<br> Selecciona la opcion deseada <br>
                <hr>
                <br> De lo contrario selecciona:<br> 
                'N' - para agregar Nueva direccion <br>
                'S' - para Salir ";

        echo json_encode(["campo" => "direccionElegida", "texto" => $texto]);
    } else {
        $texto = "Querés solicitar un movil? <br>
        Tenemos registradas las siguientes direcciones: <br>";
        foreach ($direcciones as $index => $direccion) {
            $texto .= $index + 1 . " - " . strtoupper($direccion) . "<br>";
        }
        $texto .= "<br> Selecciona la opcion deseada <br>
            <hr>
            <br> De lo contrario selecciona:<br> 
            'N' - para agregar Nueva direccion
            'S' - para Salir ";

        echo json_encode(["campo" => "direccionElegida", "texto" => $texto]);
    }
}


function solicitarDireccion()
{
    global $con, $nuevaCalle, $nuevaNumeracion, $nuevaCiudad, $nombre, $confirmarNuevaDireccion, $direcciones;
    if ($nuevaCalle == "") {
        $texto = "Hola <b>$nombre</b>. <br>";
        $texto .= "Vamos a registrar una nueva dirección. <br><br> ¿Podrías indicarme el '<b>nombre de la calle</b>' donde necesitás el móvil? <br> (Solo el nombre, sin el numero) ";
        echo json_encode(["campo" => "pedirDireccion", "texto" => "$texto"]);
        return;
    } else {
        if ($nuevaNumeracion == "") {
            $texto = "OK, ahora necesitaría '<b>la numeración (altura) de la calle</b>' donde necesitás el móvil <br> (solo el número) ";
            echo json_encode(["campo" => "pedirAltura", "texto" => $texto]);
            return;
        } else {
            if ($nuevaCiudad == "") {
                $texto = "Por último, necesitaría que me indiques <b>la ciudad</b> donde necesitás el móvil";
                echo json_encode(["campo" => "pedirCiudad", "texto" => $texto]);
            } else {
                if ($confirmarNuevaDireccion == "") {
                    $texto = "GRACIAS!!! Haz ingresado $nuevaCalle $nuevaNumeracion, $nuevaCiudad. <br> 
                        Por favor presiona: <br>
                        1 - si es correcto o <br>
                        2 - si necesitas modificar los datos ingresados. <br>";
                    echo json_encode(["campo" => "confirmarNuevaDireccion", "texto" => $texto]);
                } else if ($confirmarNuevaDireccion == "1") {
                    $nueva = "$nuevaCalle $nuevaNumeracion $nuevaCiudad";
                    array_push($direcciones, $nueva);
                    $implode = implode(",", $direcciones);
                    $sql2 = "update clientes set direcciones = '$implode' where id = 1 ";
                    $query2 = mysqli_query($con, $sql2);

                    ofrecerServicio1();
                } else if ($confirmarNuevaDireccion == "2") {
                    $nuevaCalle = "";
                    $nuevaNumeracion = "";
                    $nuevaCiudad = "";
                    solicitarDireccion();
                }
            }
        }
    }
}


function saludar($nombre = "")
{
    global $primerSaludo, $segundoSaludo, $Qsaludos;

    if ($Qsaludos == 0) {
        $saludo = $primerSaludo[random_int(0, 2)];
        $mensaje = "Hola <b>$nombre</b>, $saludo <br>";
        $Qsaludos = 1;
        return $mensaje;
    } else {
        $saludo = $segundoSaludo[random_int(0, 2)];
        $mensaje = "Hola <b>$nombre</b>, $saludo <br>";
        return $mensaje;
    }
}
