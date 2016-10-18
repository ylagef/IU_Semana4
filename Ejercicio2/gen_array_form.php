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

    arrayPush($item);

    echo "</p>";
}

echo "INPUTS: ";

foreach ($arrayInputs as $item) {
    echo var_dump($item);
}

echo "FINAL: ";

foreach ($arrayFinal as $item) {
    echo var_dump($item);
}


function arrayPush($arrayToPush)
{
    //Aquí tenemos que parsear el array que nos da la base de datos y meterlo en el array final.

    if (strpos($arrayToPush["Type"], 'enum') !== false) {
        //La enumeración.
        //Cuando sea esto, hay que cerrar el array de inputs y meterlo en en el general.

        array_push($arrayFinal, $arrayInputs); //Mete en el array general el array de inputs.

        /*

         Aquí código de meter el enum.

        */
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

        $type = explode("(", $arrayToPush["Type"]);

        $arrayAux = array("type" => $type[0], "name" => $name[0], "textointro" => $textointro);
        array_push($arrayInputs, $arrayAux); //Mete en el array de Inputs cada array formado.

    }

    return;
}

$conn->close();