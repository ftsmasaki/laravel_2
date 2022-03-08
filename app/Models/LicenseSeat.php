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
    protected $fillable = [ 'id','product_name','product_key','expire_date','purchase_date' ];
    public $sortable = [ 'id','product_name','product_key','expire_date','purchase_date' ];//ソートに使うカラムを指定

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }
}
