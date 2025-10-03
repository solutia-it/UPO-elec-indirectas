<?php
namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $deptRepo;

    public function __construct(DepartmentRepository $deptRepo)
    {
        $this->deptRepo = $deptRepo;
    }

    public function getAll()
    {
        return $this->deptRepo->All();
    }

    public function getAllById($id)
    {
        return $this->deptRepo->find($id);
    }
}