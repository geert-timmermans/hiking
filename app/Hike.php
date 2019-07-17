<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    protected $fillable = [
        'duration', 'distance', 'avg_speed', 'kcal', 'steps', 'week', 'month', 'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gethikes()
    {

        //return $this->where()
    }
}
