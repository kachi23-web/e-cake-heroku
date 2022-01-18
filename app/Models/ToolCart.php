<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolCart extends Model
{
    use HasFactory;
    protected $table = 'toolscart';
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
        
        }
}
