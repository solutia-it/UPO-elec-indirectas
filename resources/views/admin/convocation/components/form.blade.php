<div class="row mb-5">
    <div class="form-group col-12 mb-3">
        <label class="form-label" for="nombre">Título</label>
        <textarea rows="2" maxlength="1000" class="form-control" id="nombre" name="nombre"
            @if ($disable) disabled @endif required>{{ old('nombre', $convocation->nombre ?? '') }}</textarea>
    </div>
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label class="form-label" for="dateInit">Fecha de inicio</label>
        <input type="datetime-local" class="form-control" id="dateInit" name="fecha_inicio"
            value="{{ old('fecha_inicio', isset($convocation) ? \Carbon\Carbon::parse($convocation->fecha_inicio)->format('Y-m-d\TH:i') : '') }}"
            required>
    </div>
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label class="form-label" for="dateEnd">Fecha de fin</label>
        <input type="datetime-local" class="form-control" id="dateEnd" name="fecha_fin"
            value="{{ old('fecha_fin', isset($convocation) ? \Carbon\Carbon::parse($convocation->fecha_fin)->format('Y-m-d\TH:i') : '') }}"
            required>
    </div>
    <div class="form-group col-12 col-md-6 col-lg-4">
        <label class="form-label" for="type">Tipo</label>
        <select class="form-select form-control" id="type" name="tipo" required>
            <option value="" @if (old('tipo', $convocation->tipo ?? '') == '') selected @endif>Seleccionar</option>
            @foreach ($types as $type)
                <option value="{{ $type }}" @if (old('tipo', $convocation->tipo ?? '') == $type) selected @endif>
                    {{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
    </div>

    <div id="centerSeatsContainer" class="col-12 mt-5" @if (!isset($convocation) || $convocation->tipo != Constants::TYPE_CENTER) style="display: none;" @endif>
        <h2>Plazas por centro</h2>
        <table class="table table-secondary-upo w-auto mt-3">
            <thead>
                <tr>
                    <th>Centro</th>
                    <th>Plazas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centers as $center)
                    <tr>
                        <td>{{ $center->nombre_centro }}</td>
                        <td>
                            <input type="number" class="form-control form-control-sm w-auto" style="max-width: 100px;"
                                name="centers[{{ $center->id_centro }}]" min="0"
                                value="{{ old('centers.' . $center->id_centro, $convocation->centers[$center->id_centro] ?? '') }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="deptSeatsContainer" class="col-12 mt-5" @if (!isset($convocation) || $convocation->tipo != Constants::TYPE_DEPARTMENT) style="display: none;" @endif>
        <h2>Plazas por departamento</h2>
        <table class="table table-secondary-upo w-auto mt-3">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Plazas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->nombre_departamento }}</td>
                        <td>
                            <input type="number" class="form-control form-control-sm w-auto" style="max-width: 100px;"
                                name="departments[{{ $department->id_departamento }}]" min="0"
                                value="{{ old('departments.' . $department->id_departamento, $convocation->departments[$department->id_departamento] ?? '') }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
