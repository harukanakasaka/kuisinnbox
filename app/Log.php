<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['product_name', 'title', 'comment', 'myfile', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
