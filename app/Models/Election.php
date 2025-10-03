<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elecciones';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = ['id'];

}