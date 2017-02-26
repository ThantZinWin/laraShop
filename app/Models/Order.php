<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;	
    protected $table = 'orders';

    protected $fillable = ['customer_id','order_amount','order_address','order_phone','order_status','payment_status','payment_method'];
}
