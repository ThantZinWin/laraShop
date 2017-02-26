<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;	
    protected $table = 'order_items';

    protected $fillable = ['product_id','order_id','order_item_amount','status','qty'];
}
