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
$arrayInputs = array();

foreach ($result as $item) {
    echo "<p>";

    $aPush = new arrayPush($arrayFinal, $arrayInputs, $item);

    echo "</p>";
}


class arrayPush
{
    function arrayPush($arrayFinal, $arrayInputs, $arrayToPush)
    {
        //Aquí tenemos que parsear el array que nos da la base de datos y meterlo en el array final.
        //echo var_dump($arrayToPush); //Imprime el array a introducir.

        if (strpos($arrayToPush["Type"], 'enum') !== false) {
            //La enumeración.
            //Cuando sea esto, hay que cerrar el array de inputs y meterlo en en el general.
            array_push($arrayFinal, $arrayInputs); //Mete en el array general el array de inputs.
            //ºecho var_dump($arrayInputs);

        } else {
            //Todos los tipos menos las enumeraciones.
            $name = explode("\"", $arrayToPush["Field"]);

            if ($name[0] == "usergit") {
                $textointro = "Usuario en git";
            } elseif ($name[0] == "fechnacuser") {
                $textointro = "Fecha Nacimiento Usuario";
            } elseif ($name[0] == "emailuser") {
                $textointro = "Email del Usuario";
            } elseif ($name[0] == "nombreuser") {
                $textointro = "Nombre del Usuario";
            } elseif ($name[0] == "apellidosuser") {
                $textointro = "Apellidos del Usuario";
            } elseif ($name[0] == "cursoacademicouser") {
                $textointro = "Curso Académico más alto";
            } elseif ($name[0] == "titulacionuser") {
                $textointro = "Titulación del Usuario";
            }

            $arrayAux = array("type" => $arrayToPush["Type"], "name" => $name[0], "textointro" => $textointro);
            array_push($arrayInputs, $arrayAux); //Mete en el array de Inputs cada array formado.

            echo var_dump($arrayInputs);
        }

        return;
    }
}


$conn->close();