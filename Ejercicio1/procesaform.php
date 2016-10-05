<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getpost = $_POST;
} else {
    $getpost = $_GET;
}

$formAux = $getpost["form"];
$form = unserialize($formAux);

foreach ($form["input"] as $array) {
    echo "<p>" . $array["textointro"] . ": " . $getpost[$array["name"]] . "</p>";
}

echo "<p>" . $form["select"]["textointro"] . ": " . $getpost[$form["select"]["name"]] . "</p>";

if ($getpost["textarea"] != null) {
    echo "<p>Textarea: " . $getpost["textarea"] . "</p>";
}

?>

</body>

</html>