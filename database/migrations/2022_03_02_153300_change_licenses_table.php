<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licenses', function (Blueprint $table) {
            // カラムにNULLを許容
            $table->date('expire_date')->nullable()->change();
            $table->date('purchase_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('licenses', function (Blueprint $table) {
            // 既にテーブルの対象カラムにNULLを登録しているならば必要
            // DB::statement('UPDATE `licenses` SET `expire_date` = "" WHERE `expire_date` IS NULL');

            // noteカラムにNULLを許容しない
            // 5.5以降？
            $table->date('expire_date')->nullable(false)->change();
            $table->date('purchase_date')->nullable(false)->change();
        });
    }
}
