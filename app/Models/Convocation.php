<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    protected $table = 'convocatorias';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = ['id'];

    public function elections()
    {
        return $this->hasMany(Election::class, 'convocatoria_id', 'id');
    }
}