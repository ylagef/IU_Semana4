<?php

//Este es el array a transformar.
$form = array("action" => "procesaform.php", "method" => "get", "input" => array(array('type' => 'text',
    'name' => 'usergit', 'textointro' => 'Usuario en git'), array('type' => 'email', 'name' => 'emailgit', 'textointro' =>
    'Email del Usuario git'), array('type' => 'date', 'name' => 'fechnacuser', 'textointro' => 'Fecha Nacimiento Usuario'),
    array('type' => 'text', 'name' => 'nombreuser', 'textointro' => 'Nombre del Usuario'), array('type' => 'text', 'name' =>
        'apellidosuser', 'textointro' => 'Apellidos del Usuario'), array('type' => 'text', 'name' => 'titulacionuser',
        'textointro' => 'Titulación del Usuario'), array('type' => 'number', 'name' => 'cursoacademicouser', 'textointro'
    => 'Curso Académico más alto')), "select" => array('textointro' => 'Grupo Prácticas', 'name' => 'grupopracticas',
    'multiple' => 'false', 'values' => array('IU1', 'IU2', 'IU3', 'IU4')), "textarea" => '', "submit" =>
    array(array('type' => 'submit', 'name' => 'accion', 'textointro' => 'Insertar'), array('type' => 'submit', 'name' =>
        'accion', 'textointro' => 'Consultar')), "reset" => array(array('type' => 'reset', 'name' => 'accion',
    'textointro' => 'Resetear')));

$aTf = new arrayToForm();
$aTf->imprimeFormulario($form);

class arrayToForm
{

    function imprimeFormulario($form)
    {
        echo "<html lang='es'>
                <head>
                Formulario Práctica
                <meta charset='UTF-8'>
                </head>
                <body>";

        echo "<form action='" . $form["action"] . "' method='" . $form["method"] . "'>";

        echo "<input type='hidden' name='form' value='" . serialize($form) . "'>";

        foreach ($form["input"] as $array) {
            echo "<p>" . $array["textointro"];
            echo " <input type='" . $array["type"] . "' ";
            echo "name='" . $array["name"] . "'></p>";
        }

        if (array_key_exists("select", $form)) {
            echo $form["select"]["textointro"] . "<p><select name = '" . $form["select"]["name"] . "' ";
            if ($form["select"]["multiple"] == true) {
                echo "multiple";
            }
            echo ">";

            foreach ($form["select"]["values"] as $item) {
                echo "<option value = '" . $item . "' > " . $item . "</option>";
            }

            echo "</select></p> ";
        }

        if (array_key_exists("textarea", $form)) {
            echo " <p><textarea name='textarea'> " . $form["textarea"] . " </textarea></p> ";
        }

        foreach ($form["submit"] as $array) {
            echo " <input type = 'submit' name = '" . $array["name"] . "' value = '" . $array["textointro"] . "''> ";
        }

        foreach ($form["reset"] as $array) {
            echo "<input type='reset' name='" . $array["name"] . "' value='" . $array["textointro"] . "''> ";
        }

        echo "</form>
              </body>
              </html>";
    }
}

?>