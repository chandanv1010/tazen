<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "PRODUCT CATALOGUES:\n";
$cats = \DB::table('product_catalogues')->get();
foreach($cats as $c) {
    $lang = \DB::table('product_catalogue_language')->where('product_catalogue_id', $c->id)->first();
    $name = $lang ? $lang->name : 'N/A';
    echo "ID: {$c->id}, name: {$name}, parent_id: {$c->parent_id}, lft: {$c->lft}, rgt: {$c->rgt}, level: {$c->level}\n";
}

echo "\nWIDGETS OF PRODUCT MODEL:\n";
$widgets = \DB::table('widgets')->where('model', 'like', '%Product%')->get();
foreach($widgets as $w) {
    echo "ID: {$w->id}, keyword: {$w->keyword}, model: {$w->model}, model_id: {$w->model_id}\n";
}
