<?php
namespace App\Services;

use App\Constants\Constants;
use App\Repositories\ElectionRepository;
use Carbon\Carbon;

class ElectionService
{
    protected $elecRepo;

    public function __construct(ElectionRepository $elecRepo)
    {
        $this->elecRepo = $elecRepo;
    }

    public function saveListCenters($idConvocation, $listSeats)
    {
        foreach($listSeats as $key => $seats) {
            $this->elecRepo->updateOrCreate(
                [
                    'centro_id' => $key,
                    'convocatoria_id' => $idConvocation
                ],
                [
                    'plazas' => $seats
                ]
            );
        }
    }

    public function saveListDepartments($idConvocation, $listSeats)
    {
        foreach($listSeats as $key => $seats) {
            $this->elecRepo->updateOrCreate(
                [
                    'departamento_id' => $key,
                    'convocatoria_id' => $idConvocation
                ],
                [
                    'plazas' => $seats
                ]
            );
        }
    }

    public function getCentersSeats($idConvocation)
    {
        $elections = $this->elecRepo->getByConvocation($idConvocation);
        $seats = [];
        foreach($elections as $item) {
            $seats[$item->centro_id] = $item->plazas;
        }

        return $seats;
    }

    public function getdepartmentsSeats($idConvocation)
    {
        $elections = $this->elecRepo->getByConvocation($idConvocation);
        $seats = [];
        foreach($elections as $item) {
            $seats[$item->centro_id] = $item->plazas;
        }

        return $seats;
    }
}