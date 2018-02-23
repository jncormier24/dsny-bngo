<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(GameItem::class);
    }
}
