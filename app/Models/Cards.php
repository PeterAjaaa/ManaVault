<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    public function cardSets()
    {
        return $this->belongsTo(CardSets::class, 'set_id');
    }
}
