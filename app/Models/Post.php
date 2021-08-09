<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable= [
      'title',
      'body',
      'pic',
      'slug',
      'status',
      'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
