<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sets;

class Cards extends Model
{
    public function sets()
    {
        return $this->belongsTo(Sets::class);
    }

    public function deckCards()
    {
        return $this->hasMany(DeckCards::class);
    }
}
