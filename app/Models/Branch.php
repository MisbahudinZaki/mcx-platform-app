<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'status',
        'available_nostro',
        'tf_exposure',
        'suggested_rate',
        'cof',
        'cof_margin',
        'remark',
        'match_confidence',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

}
