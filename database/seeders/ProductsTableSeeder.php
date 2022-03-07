<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        //DB::table('products')->truncate();

        //データを手動で作成
        // 初期データ用意
         $products = [
             ['product_name' => 'ESET Internet Security'],
             ['product_name' => 'Microsoft Office Home & Business 2019'],
             ['product_name' => 'YMS-VPN8'],
         ];

        // 登録
         foreach($products as $product) {
             \App\Models\Product::create($product);
         }

    }
}
