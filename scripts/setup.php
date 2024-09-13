<?php

echo "Setting up Elephantino skeleton app...\n\n";

$filesToCopy = [
    './vendor/kamsaf/elephantino/scripts/base/index.php' => './src/index.php',
    './vendor/kamsaf/elephantino/scripts/base/main.php' => './main.php',
];

foreach ($filesToCopy as $source => $destination) {
    if (file_exists($source)) {
        if (copy($source, $destination)) {
            echo "Copied $source to $destination\n";
        } else {
            echo "Failed to copy $source to $destination\n";
        }
    } else {
        echo "Source file $source does not exist\n";
    }
}

echo "\nSetup completed!\n";
