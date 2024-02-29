<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users_table';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'subscription_plan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's role as a string.
     *
     * @return string
     */
    public function getRoleAttribute()
    {
        switch ($this->attributes['role']) {
            case 1:
                return 'Admin';
            case 2:
                return 'Operator';
            case 3:
                return 'User';
            case 4:
                return 'Client';
            default:
                return 'Unknown Role';
        }
    }
}
