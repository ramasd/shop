<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'path'];
}
