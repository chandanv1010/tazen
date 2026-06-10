<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "PRODUCT CATALOGUES COLUMNS:\n";
$columns = \Schema::getColumnListing('product_catalogues');
print_r($columns);

echo "\nPRODUCT CATALOGUE LANGUAGE COLUMNS:\n";
$columnsLang = \Schema::getColumnListing('product_catalogue_language');
print_r($columnsLang);
