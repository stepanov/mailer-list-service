<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'name',
        'type',
    ];

    public static $fieldValidations = [
        'email' => 'required|email_format',
    ];

    /**
     * Get fields belonged to subscriber
     */
    public function fields()
    {
        return $this->hasMany('App\Field');
    }
}
