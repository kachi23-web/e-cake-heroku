<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';
    protected $fillable = [
            'cake_size',
            'cake_step',
    ];

    /* public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
        } */
}
