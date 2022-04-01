<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//追記

class License extends Model
{
    use HasFactory;

    //以下、column-sortable用に追記
    use Sortable;
    protected $fillable = [ 'id','product_name','product_key','expire_date','purchase_date' ];
    public $sortable = [ 'id','product_name','product_key','expire_date','purchase_date' ];//ソートに使うカラムを指定

    //リレーション定義
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function license_seat()
    {
        return $this->hasMany(LicenseSeat::class);
    }
}
