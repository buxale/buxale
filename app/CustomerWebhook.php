<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerWebhook extends Model
{
    protected $fillable = ['webhook', 'user_id', 'auth_token'];
}
