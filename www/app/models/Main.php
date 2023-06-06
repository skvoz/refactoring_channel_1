<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Main';

    protected $fillable = ['field1', 'field2', 'field3', 'field4'];
}
