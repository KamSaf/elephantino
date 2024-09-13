<?php

echo "Setting up Elephantino skeleton app...\n\n";

$filesToCopy = [
    './vendor/kamsaf/elephantino/scripts/base/index.php' => './index.php',
    './vendor/kamsaf/elephantino/scripts/base/main.php' => './src/main.php',
];

foreach ($filesToCopy as $source => $destination) {
    if (file_exists($source)) {
        $name = explode($destination, '/')[1];
        if (copy($source, $destination)) {
            echo "Created $name in $destination\n";
        } else {
            echo "Failed to create $name in $destination\n";
        }
    } else {
        echo "Source file $source does not exist\n";
    }
}

echo "\nSetup completed!\n";
