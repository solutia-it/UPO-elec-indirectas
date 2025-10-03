<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:departamento,centro',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'centers' => 'nullable|array',
            'centers.*' => 'nullable|integer|min:0',
            'departments' => 'nullable|array',
            'departments.*' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la convocatoria es obligatorio.',
            'tipo.in' => 'El tipo debe ser "departamento" o "centro".',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'centers.*.integer' => 'Las plazas de cada centro deben ser un número entero.',
            'centers.*.min' => 'Las plazas de cada centro no pueden ser negativas.',            
            'departments.*.integer' => 'Las plazas de cada departamento deben ser un número entero.',
            'departments.*.min' => 'Las plazas de cada departamento no pueden ser negativas.',
        ];
    }
}
