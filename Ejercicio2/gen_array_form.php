<?php

$servername = "localhost";
$username = "iu2016";
$password = "iu2016";
$dbname = "IU2016";

// Conectar con la base de datos.
$conn = new mysqli($servername, $username, $password, $dbname);
// Comprobar que la conexión no haya fallado.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Sentencia para obtener la estructura.
$sql = "show columns from USUARIOS";
$result = $conn->query($sql);

//Mostrar por pantalla el array de la estructura que tiene la tabla de la Base de Datos.
$arrayFinal = array("action" => "", "method" => ""); //Empieza el array básico.
foreach ($result as $item) {
    echo "<p>";

    $aPush = new arrayPush($arrayFinal, $item);

    echo "</p>";
}

class arrayPush
{
    function arrayPush($arrayFinal, $arrayToPush)
    {
        //Aquí tenemos que parsear el array que nos da la base de datos y meterlo en el array final.
        echo var_dump($arrayToPush); //Imprime el array a introducir.
        


        return;
    }
}


$conn->close();