<?php
namespace App\Services;

use App\Repositories\CenterRepository;

class CenterService
{
    protected $centerRepo;
    protected $elecRepo;

    public function __construct(CenterRepository $centerRepo)
    {
        $this->centerRepo = $centerRepo;
    }

    public function getAll()
    {
        return $this->centerRepo->All();
    }

    public function getAllById($id)
    {
        return $this->centerRepo->find($id);
    }
}