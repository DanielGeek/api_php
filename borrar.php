<?php
//archivo para enviar datos por post a la API
//Lo primerito, creamos una variable iniciando curl, pasándole la url
$ch = curl_init('http://localhost/API_ejemplos/API_php/product/delete.php');
 
//especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
curl_setopt($ch, CURLOPT_POST, 1);
// la data que enviaremos por post
$data = array(
    "id" => "12"
);
//le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
// y convertimos la data en formato json
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
 
//le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
//recogemos la respuesta
$respuesta = curl_exec($ch);
// decodificamos la resp que vine en json
$respuesta = json_decode($respuesta);
echo $respuesta->message;
// foreach($respuesta as $resp)
// {
//     // echo $respuesta->message;
//     echo $respuesta->error;
// }


//o el error, por si falla
$error = curl_error($ch);
if($error)
echo $error;
 
//y finalmente cerramos curl
curl_close ($ch);
?>