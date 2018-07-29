<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ManualTransaction extends Model
{
    var $table = 'manual_transactions';

    var $fillable = ['merchant_reference', 'status', 'card_number',
        'access_code', 'response_code', 'token_name', 'card_bin',
        'service_command', 'return_url', 'response_message',
        'language', 'expiry_date', 'merchant_identifier', 'signature'];

    public function invoice(){
        return $this->belongsTo('App\models\ManualInvoice', 'merchant_reference', 'merchant_reference');
    }
}
