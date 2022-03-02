<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\License;

class LicensesTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        DB::table('licenses')->truncate();

        //データを手動で作成
        // //初期データ用意
        // $licenses = [
        //     ['product_name' => 'ESET Internet Security',
        //     'product_key' => 'ABC1-ABCD1234',
        //     'expire_date' => '2022-02-28',
        //     'purchase_date' => '2021-03-01',
        //     'is_notify' => true],
        // ];

        // //登録
        // foreach($licenses as $license) {
        //     \App\Models\License::create($license);
        // }

        //データをFakerで自動作成
        License::factory()->count(50)->create();
    }
}
