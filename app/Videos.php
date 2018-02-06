<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['videos', 'event_id'];
    public function event() {
        return $this->belongsTo(Event::class);
    }
}
