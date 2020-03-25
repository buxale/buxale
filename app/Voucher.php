<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Voucher extends Model
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'value',
        'meta',
        'beneficiary_company',
        'beneficiary_name',
        'beneficiary_street',
        'beneficiary_street_no',
        'beneficiary_zip',
        'beneficiary_city',
        'beneficiary_country',
        'beneficiary_email',
        'beneficiary_phone',
        'customer_name',
        'customer_street',
        'customer_street_no',
        'customer_zip',
        'customer_city',
        'customer_country',
        'customer_email',
        'customer_phone',
        'open_for_payment',
        'paid_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'used_at',
    ];

    /* RELATIONS */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function getNameAttribute()
    {
        return $this->customer_name;
    }

    public function getEmailAttribute()
    {
        return $this->customer_email;
    }
}
