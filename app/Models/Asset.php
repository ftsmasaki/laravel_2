<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//追記

class Asset extends Model
{
    use HasFactory;

    use Sortable;
    protected $fillable = [ 'id','customer_name','asset_name','asset_user_name' ];
    public $sortable = [ 'id','customer_name','asset_name','asset_user_name' ];//ソートに使うカラムを指定

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function licenseseats()
    {
        return $this->hasMany(LicenseSeat::class);
    }
}
