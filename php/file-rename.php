<?php
$filename = 'example.txt';
$file = fopen($filename, 'w');

if ($file) {
    echo "File created successfully";
    fwrite($file, "Hello, this is a test file.");
    fclose($file);
} else {
    echo "Failed to create the file.<br>";
}

$originalFilename = 'example.txt';
$newFilename = 'new_example.txt';

if (rename($originalFilename, $newFilename)) {
    echo "File renamed successfully to $newFilename.";
} else {
    echo "Failed to rename the file.";
}

