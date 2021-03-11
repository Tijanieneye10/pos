<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoppingcart extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
