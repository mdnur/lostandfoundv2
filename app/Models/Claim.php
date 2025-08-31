<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    //
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function claimer()
    {
        return $this->belongsTo(User::class, 'claimer_id', 'id');
    }
}
