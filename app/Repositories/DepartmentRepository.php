<?php

namespace App\Repositories;

use App\Models\Deparment;

class DepartmentRepository
{
    public function all()
    {
        return Deparment::All();
    }

    public function find($id)
    {
        return Deparment::where('id_departamento', $id);
    }
}