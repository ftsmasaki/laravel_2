<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//追記

class Product extends Model
{
    use HasFactory;

    //以下、column-sortable用に追記
    use Sortable;
    protected $fillable = [ 'id','product_name' ];
    public $sortable = [ 'id','product_name' ];//ソートに使うカラムを指定

    //孫テーブルとのリレーションを定義
    public function license()
    {
        return $this->hasMany(License::class);
    }
}
