<?php

namespace App\Repositories;

use App\Models\Election;

class ElectionRepository
{
    public function all()
    {
        return Election::get();
    }

    public function find($id)
    {
        return Election::find($id);
    }

    public function getByConvocation($idConvocation)
    {
        return Election::where('convocatoria_id', $idConvocation)
            ->get();
    }

    public function create(array $data)
    {
        return Election::create($data);
    }

    public function update($id, array $data)
    {
        $election = $this->find($id);
        $election->update($data);

        return $election;
    }

    public function updateOrCreate($dataFind, $data)
    {
        return Election::updateOrCreate($dataFind,$data);
    }
}