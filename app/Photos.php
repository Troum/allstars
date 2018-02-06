<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['photos', 'event_id'];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
