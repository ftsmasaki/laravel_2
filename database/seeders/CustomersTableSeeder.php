<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['customer_name' => '住まいLOVE不動産株式会社'],
            ['customer_name' => '株式会社チュウチク'],
            ['customer_name' => '社会福祉法人豊橋市福祉事業会'],
        ];

        // 登録
        foreach($customers as $customer) {
            Customer::create($customer);
        }
    }
}
