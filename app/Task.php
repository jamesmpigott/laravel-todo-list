<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Default attributes
     * @var array
     */
    protected $attributes = [
    	'completed' => false, 
    ];
}
