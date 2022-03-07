<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = [
            ['customer_id' => '1',
            'asset_name' => 'Latitude 3520',
            'asset_user_name' => 'm058'],
            ['customer_id' => '2',
            'asset_name' => 'OptiPlex 3080',
            'asset_user_name' => 'chuchiku64'],
            ['customer_id' => '3',
            'asset_name' => 'Latitude 3320',
            'asset_user_name' => 'works16'],
        ];

        // 登録
        foreach($assets as $asset) {
            Asset::create($asset);
        }
    }
}
