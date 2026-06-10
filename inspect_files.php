<?php
echo "FILES IN PUBLIC DIRECTORY:\n";
$files = glob("public/vendor/frontend/img/project/tazen/*");
foreach($files as $f) {
    echo "- $f (" . filesize($f) . " bytes)\n";
}

echo "\nFILES IN RESOURCES DIRECTORY:\n";
$files2 = glob("resources/vendor/frontend/resources/img/project/tazen/*");
foreach($files2 as $f) {
    echo "- $f (" . filesize($f) . " bytes)\n";
}
