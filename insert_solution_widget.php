<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

DB::beginTransaction();
try {
    echo "Starting Database Setup for Solutions (Giải Pháp)...\n";

    // 1. Clean up existing records to ensure clean runs
    $existingCatIds = DB::table('post_catalogue_language')
        ->whereIn('canonical', ['giai-phap'])
        ->pluck('post_catalogue_id')
        ->toArray();

    if (!empty($existingCatIds)) {
        DB::table('routers')
            ->where('controllers', 'App\Http\Controllers\Frontend\PostCatalogueController')
            ->whereIn('module_id', $existingCatIds)
            ->delete();

        DB::table('post_catalogue_language')
            ->whereIn('post_catalogue_id', $existingCatIds)
            ->delete();

        // Find child posts from these categories
        $childPostIds = DB::table('post_catalogue_post')
            ->whereIn('post_catalogue_id', $existingCatIds)
            ->pluck('post_id')
            ->toArray();

        if (!empty($childPostIds)) {
            DB::table('routers')
                ->where('controllers', 'App\Http\Controllers\Frontend\PostController')
                ->whereIn('module_id', $childPostIds)
                ->delete();

            DB::table('post_language')
                ->whereIn('post_id', $childPostIds)
                ->delete();

            DB::table('post_catalogue_post')
                ->whereIn('post_id', $childPostIds)
                ->delete();

            DB::table('posts')
                ->whereIn('id', $childPostIds)
                ->delete();
        }

        DB::table('post_catalogues')
            ->whereIn('id', $existingCatIds)
            ->delete();

        echo "Cleaned up existing Post Catalogue and child Posts.\n";
    }

    // Clean up routers by canonical names just in case
    DB::table('routers')->whereIn('canonical', ['giai-phap', 'sang-trong', 'ben-bi', 'trach-nhiem'])->delete();
    // Clean up widgets
    DB::table('widgets')->where('keyword', 'solution')->delete();

    // 2. Insert parent category
    $maxRgt = DB::table('post_catalogues')->max('rgt') ?: 0;
    $lft = $maxRgt + 1;
    $rgt = $maxRgt + 2;

    $now = Carbon::now();

    $catalogueId = DB::table('post_catalogues')->insertGetId([
        'parent_id' => 0,
        'lft' => $lft,
        'rgt' => $rgt,
        'level' => 1,
        'image' => null,
        'icon' => null,
        'album' => null,
        'publish' => 2,
        'follow' => 1,
        'order' => 0,
        'user_id' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);

    DB::table('post_catalogue_language')->insert([
        'post_catalogue_id' => $catalogueId,
        'language_id' => 1,
        'name' => 'Giải Pháp',
        'canonical' => 'giai-phap',
        'description' => '<p>Giải pháp tối ưu cho mọi ngôi nhà</p>',
        'content' => '<p>Giải pháp tối ưu cho mọi ngôi nhà</p>',
        'meta_title' => 'Giải Pháp',
        'meta_keyword' => 'giai phap',
        'meta_description' => 'Giải pháp',
        'created_at' => $now,
        'updated_at' => $now,
    ]);

    DB::table('routers')->insert([
        'canonical' => 'giai-phap',
        'module_id' => $catalogueId,
        'language_id' => 1,
        'controllers' => 'App\Http\Controllers\Frontend\PostCatalogueController',
        'created_at' => $now,
        'updated_at' => $now,
    ]);

    echo "Inserted Post Catalogue 'Giải Pháp' (ID: $catalogueId, lft: $lft, rgt: $rgt).\n";

    // 3. Insert child posts
    $postsData = [
        [
            'name' => 'Sang trọng',
            'canonical' => 'sang-trong',
            'description' => 'Giải pháp cửa đồng bộ tiên tiến',
            'content' => 'Giải pháp đồng bộ toàn cho các thiết kế kiến trúc. Khả năng ứng dụng rộng rãi cho hệ thống cửa đi, cửa sổ, lan can và mặt dựng.',
            'image' => '/vendor/frontend/img/project/tazen/solution_sang_trong.jpg',
        ],
        [
            'name' => 'Bền bỉ',
            'canonical' => 'ben-bi',
            'description' => 'Bền bỉ vượt thời gian',
            'content' => 'Khả năng chống chịu thời tiết khắc nghiệt, chống ăn mòn tối đa, đảm bảo độ vững chắc và an toàn cho mọi công trình.',
            'image' => '/vendor/frontend/img/project/tazen/solution_ben_bi.jpg',
        ],
        [
            'name' => 'Trách nhiệm',
            'canonical' => 'trach-nhiem',
            'description' => 'Trách nhiệm với môi trường và cộng đồng',
            'content' => 'Quy trình sản xuất thân thiện với môi trường, sử dụng vật liệu tái chế, cam kết chất lượng sản phẩm bền vững cho thế hệ tương lai.',
            'image' => '/vendor/frontend/img/project/tazen/solution_trach_nhiem.jpg',
        ],
    ];

    foreach ($postsData as $idx => $p) {
        $postId = DB::table('posts')->insertGetId([
            'post_catalogue_id' => $catalogueId,
            'image' => $p['image'],
            'publish' => 2,
            'follow' => 1,
            'order' => 10 - $idx, // Ordering: higher first or vice versa
            'user_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('post_language')->insert([
            'post_id' => $postId,
            'language_id' => 1,
            'name' => $p['name'],
            'canonical' => $p['canonical'],
            'description' => $p['description'],
            'content' => $p['content'],
            'meta_title' => $p['name'],
            'meta_keyword' => strtolower($p['name']),
            'meta_description' => $p['description'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('post_catalogue_post')->insert([
            'post_catalogue_id' => $catalogueId,
            'post_id' => $postId,
        ]);

        DB::table('routers')->insert([
            'canonical' => $p['canonical'],
            'module_id' => $postId,
            'language_id' => 1,
            'controllers' => 'App\Http\Controllers\Frontend\PostController',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        echo "Inserted Post '{$p['name']}' (ID: $postId).\n";
    }

    // 4. Insert widget
    DB::table('widgets')->insert([
        'name' => 'Giải Pháp',
        'keyword' => 'solution',
        'description' => json_encode(['1' => 'Giải Pháp']),
        'album' => '[]',
        'model_id' => json_encode([(string)$catalogueId]),
        'model' => 'PostCatalogue',
        'short_code' => '',
        'publish' => 2,
        'note' => 'Giải pháp trang chủ switcher',
        'created_at' => $now,
        'updated_at' => $now,
    ]);

    echo "Created widget 'solution' successfully.\n";

    DB::commit();
    echo "Database Seeding Completed Successfully!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "Error Seeding Database: " . $e->getMessage() . "\n";
    exit(1);
}
