<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $dates = ['created_at', 'updated_at', 'date'];
    protected $fillable = ['image', 'date', 'additional_id', 'past_events_id', 'photographer', 'en_photographer'];

    public function event() {
        return $this->belongsTo(PastEvents::class);
    }
}
