<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['info','en_info','event_id'];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
