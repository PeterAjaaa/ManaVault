<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decks extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function formats()
    {
        return $this->belongsTo(Formats::class);
    }

    public function cards()
    {
        return $this->hasMany(Cards::class);
    }
}
