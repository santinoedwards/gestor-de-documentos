<?php
$carpeta = "archivos/";

// Verificamos si la carpeta realmente existe en el servidor
if (is_dir($carpeta)) {
    // Escaneamos la carpeta y eliminamos los puntos "." y ".." del sistema
    $archivos = array_diff(scandir($carpeta), array('..', '.'));
    
    if (count($archivos) > 0) {
        foreach ($archivos as $archivoDoc) {
            // Validamos visualmente que solo muestre extensiones .pdf
            if (strtolower(pathinfo($archivoDoc, PATHINFO_EXTENSION)) === 'pdf') {
                echo '<li>';
                echo '  <span class="icono-pdf">📄</span>';
                echo '  <a href="' . $carpeta . $archivoDoc . '" target="_blank" class="enlace-archivo">' . htmlspecialchars($archivoDoc) . '</a>';
                echo '</li>';
            }
        }
    } else {
        echo '<li class="lista-vacia">No hay archivos PDF guardados todavía.</li>';
    }
} else {
    echo '<li class="lista-error">Error: La carpeta "archivos/" no existe.</li>';
}
?>