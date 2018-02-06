<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Additional extends Model
{
    use Sluggable;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'place'
            ]
        ];
    }
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
        'time'
    ];


    protected $fillable = ['city','en_city', 'place','en_place' ,'event_id', 'date', 'time','price','en_price', 'ticket_id'];


    public function event() {
        return $this->belongsTo(Event::class);
    }
}
