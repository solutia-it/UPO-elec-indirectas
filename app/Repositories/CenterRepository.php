<?php

namespace App\Repositories;

use App\Models\Center;

class CenterRepository
{
    public function all()
    {
        return Center::All();
    }

    public function find($id)
    {
        return Center::where('id_centro', $id);
    }
}