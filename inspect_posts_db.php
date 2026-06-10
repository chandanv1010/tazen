<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "TABLES LIST:\n";
$tables = DB::select('SHOW TABLES');
foreach($tables as $table) {
    echo array_values((array)$table)[0] . "\n";
}

echo "\nPRODUCT COUNT:\n";
echo DB::table('products')->count() . "\n";

echo "\nPRODUCT CATALOGUE PRODUCT RELATION COUNT:\n";
if (Schema::hasTable('product_catalogue_product')) {
    echo DB::table('product_catalogue_product')->count() . "\n";
    $rels = DB::table('product_catalogue_product')->get();
    foreach($rels as $rel) {
        echo "Product ID: {$rel->product_id}, Catalogue ID: {$rel->product_catalogue_id}\n";
    }
} else {
    echo "No product_catalogue_product table\n";
}

echo "\nPOST CATALOGUES:\n";
$postCats = DB::table('post_catalogues')->get();
foreach($postCats as $pc) {
    $lang = DB::table('post_catalogue_language')->where('post_catalogue_id', $pc->id)->first();
    echo "ID: {$pc->id}, Name: " . ($lang ? $lang->name : 'N/A') . "\n";
}

echo "\nPOSTS (PROJECTS) DETAILS:\n";
$posts = DB::table('post_language')->whereIn('post_id', [16, 17, 18, 19, 20, 21, 22, 23])->get();
foreach($posts as $p) {
    echo "ID: {$p->post_id}\n";
    echo "Name: {$p->name}\n";
    echo "Description: " . substr(strip_tags($p->description), 0, 100) . "...\n";
    echo "Content: " . substr(strip_tags($p->content), 0, 100) . "...\n";
    echo "---------------------------------\n";
}

