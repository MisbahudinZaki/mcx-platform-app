<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancingRequest extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'counterparty_name',
        'financing_amount',
        'currency',
        'rate_type',
        'open_date',
        'maturity_date',
        'approval_note',
        'request_letter',
        'financing_rate',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
