<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'product_discretion',
        'product_pic',
        'image',
        'price',
        'status',
        'caffe_id',
        'price',


    ];
    public function caffe()
    {
        return $this->belongsTo(Caffe::class);
    }
}
