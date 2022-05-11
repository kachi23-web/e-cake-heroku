<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoping   extends Model
{
    use HasFactory;
    protected $table = 'Shop';
    protected $fillable = [
        
         'user_id',
         'prod_id',
        // 'prod_qty',
        'cake_message',
        'flavour',
        'size_id',
        'order_details',
        'total_price',
    ];

    public function details()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
        }

        public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
        }
 }
