<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
echo "Active DB: " . \DB::connection()->getDatabaseName() . "\n";
$langs = \DB::table('languages')->get();
echo "Count: " . $langs->count() . "\n";
foreach($langs as $l){
    echo "- ID: {$l->id}, canonical: {$l->canonical}, name: {$l->name}, publish: {$l->publish}\n";
}
