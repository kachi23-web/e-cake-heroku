<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
        'size_id',
        'cake_message',
        /* 'flavour',
        'size_id', */
        'order_details',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }

        public function sizes()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
}
