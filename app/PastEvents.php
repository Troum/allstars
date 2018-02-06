<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastEvents extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];


    protected $fillable = ['slug','cover','title','en_title','city','en_city', 'date','dirname'];

    public function gallery () {
        return $this->hasMany(Gallery::class);
    }
}
