<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'total_price',
        'pincode',
        'status',
        'cake_message',
        'flavour',
        'size_id',
        'order_details',
        'tracking_no',

    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /* public function users()
    {
        return $this->hasMany(User::class);
    } 

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }*/

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    
}
