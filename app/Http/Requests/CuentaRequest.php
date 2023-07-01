<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|alpha|min:2|max:20',
            'apellido' => 'required|alpha|min:2|max:20',
            'user' => 'required|min:2|max:20|unique:cuentas',
            'password' => 'required|min:6|max:100|same:password_confirmation',
        ];
    }

    public function messages():array
    {
        return [
            'nombre.required' => 'Indique un Nombre',
            'nombre.alpha' => 'Nombre debe tener solo caracteres',
            'nombre.min' => 'Nombre debe tener mínimo 2 caracteres',
            'nombre.max' => 'Nombre debe tener máximo 30 caracteres',
            'apellido.required' => 'Indique el Apellido',
            'apellido.alpha' => 'Apellido debe tener solo caracteres',
            'apellido.min' => 'Apellido debe tener mínimo 2 caracteres',
            'apellido.max' => 'Apellido debe tener máximo 30 caracteres',
            'user.required' => 'Indique un Nombre de Usuario',
            'user.min' => 'Nombre debe tener mínimo 2 caracteres',
            'user.max' => 'Nombre debe tener máximo 30 caracteres',
            'user.unique' =>'Este nombre de usuario ya esta en uso',
            'password.required' => 'Indique una Contraseña',
            'password.min' => 'La contraseña debe tener mínimo 6 caracteres',
            'password.max' => 'La contraseña debe tener máximo 100 caracteres', 
            'password.same' => 'Las Contraseñas no coinciden',
        ]; 
    } 
}
