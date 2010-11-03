<?php
header('Content-Type: text/cache-manifest');
echo "CACHE MANIFEST\n";

$hashes = "";

$dir = new RecursiveDirectoryIterator(".");
foreach(new RecursiveIteratorIterator($dir) as $file) {
    if ($file->IsFile() && $file->getFilename() != "manifest.php" && substr($file->getFilename(), 0, 1) != "." && substr($file, 2, 4) != ".git") {
        //var_dump($file->getFilename());
        //$arquivo = $file->getFilename();
        echo $file . "\n";
        $hashes .= md5_file($file);
    }
}
echo "# Hash: " . md5($hashes) . "\n";