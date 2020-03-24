<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CheckoutSession extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toWebhookData()
    {
        return [
            'ref_id' => $this->getRealRefId(),
            'session_id' => $this->session_id,
            'voucher' => $this->voucher->toArray()
        ];
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function getRealRefId()
    {
        return Str::after($this->ref_id, $this->user_id . '_');
    }
}
