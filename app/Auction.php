<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = ['name', 'category_id' , 'user_id' , 'location', 'building', 'date', 'time', 'image',];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function biddings()
    {
        return $this->hasMany(Bidding::class)->orderBy('created_at', 'DESC');
    }
}
