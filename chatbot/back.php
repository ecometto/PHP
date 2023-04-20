<?php

// // definicion de variables 
// $primerSaludo = ["Buenos días, como estás hoy?", "como estás? Espero que bien.", "espero que estés teniendo un muy buen día"];
// $segundoSaludo = ["Bienvenido nuevamente", "Un gusto saludarte de nuevo", "como estás, nuevamente"];
// $primerMsgConversacion = false;

// // Variables obtenidas de DDBB
// $Qsaludos = 0;
// // $direcciones = [""];
// $direcciones = ["Direccion de prueba 1", "Direccion de prueba 2", "Direccion de prueba 3"];

// // variables obtenidas de API
// $nombre = "Edy Dan"; //(se asume que es cliente)
// $nuevaCalle = "Pasod e los Andes";
// $nuevaNumeracion = "555";
// $nuevaCiudad = "Cordoba";
// $direccionElegida = 2; // si es = 1 entonces guardar en DDBB, si no, borrar variables e iniciar nuevamente "ofrecerServicio")
// $confirmarNuevaDireccion = "";  // si es = 1 entonces guardar en DDBB, y traer como $direcciones. Si no, borrar variables e iniciar nuevamente "ofrecerServicio")

// // ---------------------------------------
// // defincion de funciones 
// function saludar($nombre = "")
// {
//     global $primerSaludo, $segundoSaludo, $Qsaludos;

//     if ($Qsaludos == 0) {
//         $saludo = $primerSaludo[random_int(0, 2)];
//         $mensaje = "Hola $nombre, $saludo <br>";
//         return $mensaje;
//     } else {
//         $saludo = $segundoSaludo[random_int(0, 2)];
//         $mensaje = "Hola $nombre, $saludo <br>";
//         return $mensaje;
//     }
// }

// function ofrecerServicio($direcciones = [])
// {
//     global $nuevaCalle, $nuevaNumeracion, $nuevaCiudad, $direccionElegida, $confirmarNuevaDireccion;
//     if (count($direcciones) == 0) {
//         if ($nuevaCalle == "") {
//             $mensaje = "Necesitás solicitar un móvil? No tengo registrada ninguna dirección. <br> ¿Podrías indicarme el '<b>nombre de la calle</b>' donde necesitás el móvil? <br> (Solo el nombre, sin el numero) ";
//             return $mensaje;
//             // (aqui se debería capturar la nueva Calle ingresada, la cual luego la API devolverá como dato, que se igualará a $nuevaCalle)
//         } else {
//             if ($nuevaNumeracion == "") {
//                 $mensaje = "OK, ahora necesitaría '<b>la numeración (altura) de la calle</b>' donde necesitás el móvil <br> (solo el número) ";
//                 return $mensaje;
//                 // (aqui se debería capturar la nueva Numeracion ingresada, la cual luego la API devolverá como dato, que se igualará a $nuevaNumeracion)
//             } else {
//                 if ($nuevaCiudad == "") {
//                     $mensaje = "GRACIAS. Por último, necesitaría que me indiques <b>la ciudad</b> donde necesitás el móvil";
//                     return $mensaje;
//                     // (aqui se debería capturar la nueva Numeracion ingresada, la cual luego la API devolverá como dato, que se igualará a $nuevaNumeracion)
//                 } else {
//                     $mensaje = "GRACIAS!!! Haz ingresado $nuevaCalle $nuevaNumeracion, $nuevaCiudad. <br> 
//                     Por favor presiona: <br>
//                         1 si es correcto o <br>
//                         2 si necesitas modificar los datos ingresados. <br>";
//                     // aqui se debería capturar la opcion elegida y relacionarla con $confirmarNuevaDireccion)

//                     return $mensaje;
//                 }
//             }
//         }
//     } else {
//         if ($direccionElegida == "") {
//             $mensaje = "Querés solicitar un móvil? Tenemos registradas las siguientes direcciones: <br>";
//             foreach ($direcciones as $index => $direccion) {
//                 $opcion = ($index + 1);
//                 $mensaje .= $index + 1 . " - $direccion <br>";
//             };
//             $opcionOtraDireccion = count($direcciones) + 1;
//             $mensaje .= "$opcionOtraDireccion - Otra direccion <br>";
//             $mensaje .= "<br>Elige la opción deseada";
//             return $mensaje;
//             // aqui se debería capturar la opcion elegida y relacionarla con $direccionElegida (ojo que index es +1)
//         } else {
//             $mensaje = "Felicitaciones, el pedido fue tomado con exito! 
//             <br>Estamos buscando un móvil en la zona de '<b>$direcciones[$direccionElegida]</b>'... <br> Espera unos instantes por favor y te confirmaremos con un nuevo mensaje
//             <script>setTimeout(()=>{
//                 var parrafo = document.createElement('p');
//                 parrafo.innerHTML = 'Su pedido ha sido asignado a un movil (N|404). En unos minutos llegaremos a la direccion indicada'; 
//                 var body = document.body
//                 body.appendChild(parrafo)
//             }, 3000)</script>
//             ";
//             return $mensaje;
//             //guardar data del pedido en la DDBB
//         }
//     }
// }




// // programa (ver de sepoarar las funciones)
// if ($nombre == "") {
//     echo "Hola, vemos que no tenemos registrados tus datos. <br>Necesitamos que nos indiques tu nombre por favor (solo nombre)";
// } else {
//     if ($primerMsgConversacion == true) {
//         echo saludar($nombre);
//         $primerMsgConversacion == false;
//         echo ofrecerServicio($direcciones);
//     } else {
//         echo ofrecerServicio($direcciones);
//     }
// }



// echo "<br>-------------------------------------------<br>";

if(isset($_GET['procesando'])){
    json_encode($_GET['procesando']);
}
?>