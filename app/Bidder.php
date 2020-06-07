<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    public function biddings()
    {
        return $this->hasMany(Bidding::class)->orderBy('created_at', 'DESC');
    }
}
