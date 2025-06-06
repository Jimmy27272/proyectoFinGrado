<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotoRequest extends FormRequest
{

    public function authorize(): bool
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fabricante_id' => 'required',
            'modelo_id' => 'required',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'precio' => 'required|integer|min:0',
            'vin' => 'required|string|size:17',
            'kilometros' => 'required|integer|min:0',
            'moto_tipo_id' => 'required|exists:moto_tipos,id',
            'cilindrada_id' => 'required|exists:cilindradas,id',
            'ciudad_id' => 'required|exists:ciudades,id',
            'comunidad_id' => 'required|exists:comunidades,id',
            'direccion' => 'required|string',
            'phone' => 'required|string|min:9',
            'descripcion' => 'nullable|string',
            'published_at' => 'nullable|string',
            'features' => 'array',
            'features.*' => 'string',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'fabricante_id.required' => 'El fabricante es obligatorio.',
            'modelo_id.required' => 'El modelo es obligatorio.',
            'moto_tipo_id.required' => 'El tipo de moto es obligatorio.',
            'cilindrada_id.required' => 'La cilindrada es obligatoria.',
            'ciudad_id.required' => 'La ciudad es obligatoria.',
            'direccion.required' => 'La dirección es obligatoria.',
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.string' => 'El teléfono debe ser una cadena de texto.',
            'phone.min' => 'El teléfono debe tener al menos 9 caracteres.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.min' => 'El año debe ser mayor o igual a 1900.',
            'year.max' => 'El año no puede ser mayor al año actual.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.integer' => 'El precio debe ser un número entero.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
            'vin.required' => 'El VIN es obligatorio.',
            'vin.string' => 'El VIN debe ser una cadena de texto.',
            'vin.size' => 'El VIN debe tener exactamente 17 caracteres.',
            'kilometros.required' => 'Los kilómetros son obligatorios.',
            'kilometros.integer' => 'Los kilómetros deben ser un número entero.',
            'kilometros.min' => 'Los kilómetros deben ser mayores o iguales a 0.',
            
        ];
    }
}
