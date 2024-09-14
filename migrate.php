<?php

if (empty($argv[1])) {
    echo "Error: No se proporcionó un directorio." . PHP_EOL;
    return;
}

searchAndReplacePatterns($argv[1]);

function searchAndReplacePatterns($directory) {

    // Expresiones regulares y sus reemplazos
    $patterns = [
        '/(text-.*-)(left)/' => '$1start',
        '/(text-.*-)(right)/' => '$1end',
    ];

    // Extensiones permitidas
    $allowedExtensions = ['php', 'twig', 'js'];

    // Crear un iterador recursivo para recorrer los archivos
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

    foreach ($iterator as $file) {
        // Obtenemos la extensión del archivo
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        // Verificar si el archivo tiene una extensión permitida
        if (in_array($extension, $allowedExtensions)) {
            // Leer el contenido del archivo
            $content = file_get_contents($file);

            // Reemplazar los patrones encontrados
            $updatedContent = preg_replace(array_keys($patterns), array_values($patterns), $content);

            // Escribir el nuevo contenido en el archivo
            file_put_contents($file, $updatedContent);
        }
    }

    echo "\n\n############# FIN #############\n\n";
}
