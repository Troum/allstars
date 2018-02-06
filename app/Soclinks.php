<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soclinks extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['link','event_id'];


    public function soclink() {
        return $this->belongsTo(Event::class);
    }
}
