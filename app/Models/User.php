<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\Shoppingcart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'phone',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // hash password before sending to database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt(strtolower($value));
    }

    // Combine firstname and lastname
       // Let get a accessor for fullname
       public function getFullNameAttribute()
       {
           return "{$this->firstname} {$this->lastname}";
       }

       public function shoppingcart()
    {
        return $this->hasMany(Shoppingcart::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
