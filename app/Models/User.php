<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Address;
use App\Models\Pinopay;
use App\Models\Feedback;
use App\Models\UserDevice;
use App\Models\UserVoucher;
use App\Models\UserPaymentMethod;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['*'];

    protected $primaryKey = 'PK_userID';

    public $incrementing = false;

    public $timestamps=true;

    public function order(){
        return $this->HasMany(Order::class);
    }

    public function userpaymentmethod(){
        return $this->hasMany(UserPaymentMethod::class);
    }

    public function address(){
        return $this->hasMany(Address::class);
    }

    public function pinopay(){
        return $this->belongsTo(Pinopay::class);
    }

    public function membership(){
        return $this->hasOne(Membership::class, 'PK_FK_userID', 'PK_userID');
    }

    public function uservoucher(){
        return $this->hasMany(UserVoucher::class);
    }

    public function userdevice(){
        return $this->hasMany(UserDevice::class);
    }

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
