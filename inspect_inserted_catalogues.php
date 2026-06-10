<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "INSERTED PRODUCT CATALOGUES RECORDS:\n";
$cats = \DB::table('product_catalogues')->get();
foreach($cats as $c) {
    $lang = \DB::table('product_catalogue_language')->where('product_catalogue_id', $c->id)->first();
    echo "ID: {$c->id}, name: " . ($lang ? $lang->name : 'N/A') . ", image: {$c->image}, parent_id: {$c->parent_id}\n";
}
