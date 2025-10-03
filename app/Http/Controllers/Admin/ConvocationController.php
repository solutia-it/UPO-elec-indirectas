<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Constants\Constants;
use App\Services\CenterService;
use App\Services\ConvocationService;
use App\Services\DepartmentService;
use App\Http\Requests\ConvocationRequest;
use Yajra\DataTables\Facades\DataTables;

class ConvocationController extends Controller
{
    protected $convServ;
    protected $centerService;
    protected $deptService;

    public function __construct(
        ConvocationService $convServ,
        CenterService $centerService,
        DepartmentService $deptService
    )
    {
        $this->convServ = $convServ;
        $this->centerService = $centerService;
        $this->deptService = $deptService;
    }

    public function index()
    {
        return view('admin.convocation.index');
    }

    public function create()
    {
        $types = [Constants::TYPE_CENTER, Constants::TYPE_DEPARTMENT];
        $centers = $this->centerService->getAll();
        $departments = $this->deptService->getAll();

        return view('admin.convocation.create', compact('types', 'centers', 'departments'));
    }

    public function edit($id)
    {
        $convocation = $this->convServ->getConvocation($id);
        $types = [Constants::TYPE_CENTER, Constants::TYPE_DEPARTMENT];
        $centers = $this->centerService->getAll();
        $departments = $this->deptService->getAll();

        return view('admin.convocation.edit', compact('convocation', 'types', 'centers', 'departments'));
    }

    public function store(ConvocationRequest $request)
    {
        try {
            $data = $request->validated();
            $data['estado'] = Constants::STATUS_OPEN;

            $convocation = $this->convServ->save($data);

            return redirect()->route('admin.convocations.index')
                ->with('success', 'Convocatoria guardada correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ocurrió un error al guardar la convocatoria: ' . $e->getMessage());
        }
    }

    public function update(ConvocationRequest  $request, $id)
    {
        try {
            $data = $request->validated();

            $convocation = $this->convServ->save($data, $id);

            return redirect()->route('admin.convocations.index')
                ->with('success', 'Convocatoria guardada correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ocurrió un error al guardar la convocatoria: ' . $e->getMessage());
        }
    }

    public function getCenterConvocations()
    {
        try {
            $convocations = $this->convServ->getCentersConvocations();

            return DataTables::of($convocations)
                ->addColumn('acciones', function($row) {
                    return view('admin.convocation.components.action-button', ['convocation' => $row]);
                })
                ->make(true);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al obtener las convocatorias.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getDepartmentsConvocations()
    {
        try {
            $convocations = $this->convServ->getDepartmentsConvocations();

            return DataTables::of($convocations)->make(true);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al obtener las convocatorias.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function closeConvocation($id)
    {
        try {
           $this->convServ->closeConvocation($id);

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al obtener las convocatorias.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}