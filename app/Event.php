<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Sluggable;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = ['title', 'en_title', 'cover', 'description', 'en_description', 'hidden_status'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function additional () {
        return $this->hasMany(Additional::class);
    }

    public function videos () {
        return $this->hasMany(Videos::class);
    }

    public function photos () {
        return $this->hasMany(Photos::class);
    }

    public function info() {
        return $this->hasMany(AdditionalInfo::class);
    }

    public function link () {
        return $this->hasMany(Soclinks::class);
    }
}
