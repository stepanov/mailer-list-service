<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    protected $fillable = [
        'title',
        'type',
    ];

    /**
     * Get subscriber that own field
     */
    public function subscriber()
    {
        return $this->belongsTo('App\Subscriber');
    }
}
