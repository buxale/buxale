<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

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
    ];

    /* RELATIONS */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
