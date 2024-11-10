<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardSets extends Model
{
    public function cards()
    {
        return $this->hasMany(Cards::class);
    }
}
