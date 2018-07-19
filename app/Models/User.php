<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'ic',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    # Relationship table users dan tempahan (user_id)
    public function showTempahan()
    {
        return $this->hasMany(Tempahan::class, 'user_id');
    }

    /**
     * Get the user's name. dan besarkan semua huruf
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
}
