<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $gaurd = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function isAdmin()
    {
        foreach ($this->roles as $role)
            if ($role->name == 'مدیر' && $this->status == 1){
                return true;
            }
        return false;
    }
}
