<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Utils\FormatUtils;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'birthday',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->phone = str_replace('-', '', $model->phone);
        });
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function isAdmin(): bool
    {
        return isset($this->admin);
    }

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class);
    }

    public function isManager(): bool
    {
        return isset($this->manager);
    }

    public function basic_user(): HasOne
    {
        return $this->hasOne(BasicUser::class);
    }

    public function isBasicUser(): bool
    {
        return isset($this->basic_user);
    }

    public function getFormattedBirthdayAttribute()
    {
        return $this->birthday ? Carbon::parse($this->birthday)->translatedFormat('d/m/Y') : '-';
    }

    public function getFormattedPhoneAttribute()
    {
        return $this->phone ? FormatUtils::phoneNumber($this->phone) : '-';
    }

    public function getAvatarUrlAttribute()
    {
        return asset($this->avatar ? 'storage/avatars/' . $this->avatar : 'images/default/profile-0.jpg');
    }
}
