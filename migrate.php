<?php

if (empty($argv[1])) {
    echo "Error: No se proporcionó un directorio." . PHP_EOL;
    return;
}

searchAndReplacePatterns($argv[1]);

function searchAndReplacePatterns($directory) {

    // Expresiones regulares y sus reemplazos
    $patterns = [
        '/([mp])l(-[0-5])/' => '$1s$2',
        '/([mp])r(-[0-5])/' => '$1e$2',
        '/no-gutters/' => 'g-0',
        '/ close /' => ' btn-close ',
        '/left(-[0-9]*)/' => 'start$1',
        '/right(-[0-9]*)/' => 'end$1',
        '/(float|border|rounded|text)-left/' => '$1-start',
        '/(float|border|rounded|text)-right/' => '$1-end',
        '/font-weight(-[a-zA-Z]*)/' => 'fw$1',
        '/font-style(-[a-zA-Z]*)/' => 'fst$1',
        '/form-row/' => 'row',
        '/data-toggle/' => 'data-bs-toggle',
        '/data-target/' => 'data-bs-target',
        '/data-dismiss/' => 'data-bs-dismiss',
        '/badge(-[a-zA-Z]*)/' => 'bg$1',
        '/form-group/' => 'mb-3',
        '/<span class="input-group-append">\s*(.*?)\s*<\/span>/ms' => '$1',
        '/<div class="input-group-append">\s*(.*?)\s*<\/div>/ms' => '$1',
        '/<span class="input-group-prepend">\s*(.*?)\s*<\/span>/ms' => '$1',
        '/<div class="input-group-prepend">\s*(.*?)\s*<\/div>/ms' => '$1',
        '/\).modal()/' => ').modal(\\\'show\\\')',
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
