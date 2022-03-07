<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\LicenseSeat;

class LicenseSeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $license_seats = [
            ['license_id' => '1',
            'asset_id' => '1',
            'seat_memo' => '割り当てテスト１'],
        ];

        // 登録
        foreach($license_seats as $license_seat) {
            LicenseSeat::create($license_seat);
        }
    }
}
