<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//追記

class LicenseSeat extends Model
{
    use HasFactory;

    //以下、column-sortable用に追記
    use Sortable;
    //protected $fillable = [ 'id','product_name','product_key','customer_name' ];
    //public $sortable = [ 'id','product_name','product_key','customer_name' ];//ソートに使うカラムを指定

    //親テーブルとのリレーションを定義
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    //使用中の件数を取得するメソッド
    public static function countUsedLicense($license_id)
    {
        return LicenseSeat::where('license_id', $license_id)->count();
    }
}
