<?php

namespace App\Repositories;

use App\Models\Convocation;

class ConvocationRepository
{
    public function all()
    {
        return Convocation::get();
    }

    public function getAllByType($type)
    {
        return Convocation::
            where('tipo', $type)
            ->get();
    }

    public function find($id)
    {
        return Convocation::find($id);
    }

    public function create(array $data)
    {
        return Convocation::create($data);
    }

    public function update($id, array $data)
    {
        $conv = $this->find($id);
        $conv->update($data);

        return $conv;
    }

    public function updateOrCreate($dataFind, $data)
    {
        return Convocation::updateOrCreate($dataFind,$data);
    }
}