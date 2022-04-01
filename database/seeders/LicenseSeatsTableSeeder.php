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
            ['license_id' => '2',
            'asset_id' => '3',
            'seat_memo' => '割り当てテスト２'],
            ['license_id' => '4',
            'asset_id' => '15',
            'seat_memo' => '割り当てテスト３'],
        ];

        // 登録
        foreach($license_seats as $license_seat) {
            LicenseSeat::create($license_seat);
        }
    }
}
