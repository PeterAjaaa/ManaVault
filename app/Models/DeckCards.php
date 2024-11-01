<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeckCards extends Model
{
    public function decks()
    {
        return $this->belongsTo(Decks::class);
    }

    public function cards()
    {
        return $this->belongsTo(Cards::class);
    }
}
