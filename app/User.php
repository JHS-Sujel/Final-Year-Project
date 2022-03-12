<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'avatar',
        'role_id',
        'phone',
        'email',
        'address',
        'password',
        'status',
        'api_token',

        'verified',
        'verification_code',
        'expired_at'
    ];

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getProfileImageAttribute()
    {
        return public_path("storage/users/$this->avatar");
    }

    public function getProfileUrlAttribute()
    {
        return route('profile', $this->slug);
    }

    protected $appends = [
        'full_name', 'profile_image', 'profile_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function shipping_address()
    {
        return $this->hasOne(Address::class);
    }
}
