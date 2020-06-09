<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
