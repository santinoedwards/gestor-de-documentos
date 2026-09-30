<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["archivo"])) {

    // ----------------------------------------------------
    // OBTENER EL ARCHIVO
    // ----------------------------------------------------
    $archivo = $_FILES["archivo"];

    // ----------------------------------------------------
    // OBTENER EL NOMBRE DEL ARCHIVO
    // ----------------------------------------------------
    $nombre = $archivo["name"];

    // ----------------------------------------------------
    // OBTENER LA UBICACIÓN TEMPORAL
    // ----------------------------------------------------
    $temporal = $archivo["tmp_name"];

    // ----------------------------------------------------
    // VALIDAR QUE SEA SOLO PDF
    // ----------------------------------------------------
    $extension = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
    $tipoMime = $archivo["type"];

    if ($extension === "pdf" && $tipoMime === "application/pdf") {

        // ----------------------------------------------------
        // GUARDAR EL ARCHIVO
        // ----------------------------------------------------
        move_uploaded_file(
            $temporal,
            "archivos/" . $nombre
        );

        // Vuelve al index.html con un aviso de éxito
        header("Location: index.html?estado=exito");
        exit;

    } else {
        // Vuelve al index.html con un aviso de error
        header("Location: index.html?estado=error_formato");
        exit;
    }

} else {
    header("Location: index.html");
    exit;
}
?>