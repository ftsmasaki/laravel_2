<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//追記

class Customer extends Model
{
    use HasFactory;

    //以下、column-sortable用に追記
    use Sortable;
    protected $fillable = [ 'id','customer_name' ];
    public $sortable = [ 'id','customer_name' ];//ソートに使うカラムを指定
    
    //孫テーブルとのリレーションを定義
    public function license_seat()
    {
        return $this->hasManyThrough(LicenseSeat::class, Product::class);
    }
}
