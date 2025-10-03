<?php
namespace App\Services;

use App\Constants\Constants;
use App\Repositories\ConvocationRepository;
use App\Services\ElectionService;
use Carbon\Carbon;

class ConvocationService
{
    protected $convRepo;
    protected $elecService;

    public function __construct(ConvocationRepository $convRepo, ElectionService $elecService)
    {
        $this->convRepo = $convRepo;
        $this->elecService = $elecService;
    }

    public function getConvocation($id)
    {
        $convocation = $this->convRepo->find($id);

        if($convocation->tipo == Constants::TYPE_CENTER) {
            $convocation->centers = $this->elecService->getCentersSeats($convocation->id);
        } elseif($convocation->tipo == Constants::TYPE_DEPARTMENT) {
            $convocation->departments = $this->elecService->getdepartmentsSeats($convocation->id);
        }

        return $convocation;
    }

    public function save($data, $id=null)
    {
        $data['fecha_inicio'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['fecha_inicio'])
            ->format('Y-m-d H:i:s');

        $data['fecha_fin'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['fecha_fin'])
            ->format('Y-m-d H:i:s');
        $dataFind = ['id' => $id];

        $convocation = $this->convRepo->updateOrCreate($dataFind, $data);

        if($convocation->tipo == Constants::TYPE_CENTER) {
            $this->elecService->saveListCenters($convocation->id, $data['centers']);
        } elseif($convocation->tipo == Constants::TYPE_DEPARTMENT) {
            $this->elecService->saveListDepartments($convocation->id, $data['departments']);
        }

        return $convocation;
    }

    public function getCentersConvocations()
    {
        return $this->convRepo->getAllByType(Constants::TYPE_CENTER);
    }

    public function getDepartmentsConvocations()
    {
        return $this->convRepo->getAllByType(Constants::TYPE_DEPARTMENT);
    }

    public function openConvocation($convocatoriaId)
    {
        $this->convRepo->update(
            $convocatoriaId,
            [
                'estado' => Constants::STATUS_OPEN
            ]
        );
    }

    public function closeConvocation($convocatoriaId)
    {
        $this->convRepo->update(
            $convocatoriaId,
            [
                'estado' => Constants::STATUS_CLOSE
            ]
        );
    }
}

