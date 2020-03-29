<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
        'email',
        'password',
        'company',
        'street',
        'street_no',
        'zip',
        'city',
        'country',
        'phone',
        'stripe_account_id',
        'notify_users_by_default',
        'checkout_token'];

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

    /* RELATIONS */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::Class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_webhooks()
    {
        return $this->hasMany(CustomerWebhook::class);
    }

    public function isAdmin()
    {
        return Str::endsWith($this->email, ['@cierra.de', '@buxale.io']);
    }

    public function getCheckoutUrlAttribute()
    {
        if ($this->slug)
            return '/pages/' . $this->slug;

        return '/pages/' . $this->id;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
