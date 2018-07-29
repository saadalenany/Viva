<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ManualInvoice extends Model
{
    var $table = 'manual_invoices';

    var $fillable = ['name', 'phone', 'email', 'amount_for', 'amount',
        'status', 'currency', 'merchant_reference'];

}
