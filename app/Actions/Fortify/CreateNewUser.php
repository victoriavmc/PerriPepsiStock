<?php

namespace App\Actions\Fortify;

use App\Models\DatoPersonal;
use App\Models\HistorialUsuario;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    // Datos Personales
    public function create_datos(array $input)
    {
        $cuit = $input['cuit1'] . $input['cuit2'] . $input['cuit3'];

        $validator = Validator::make($input, [
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'cuit1' => ['required', 'int', 'min:2'],
            'cuit2' => ['required', 'int', 'min:8'],
            'cuit3' => ['required', 'int'],
            'fecha' => 'required',
            'genero' => 'required',
            'nacionalidad' => 'required',
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $validator->after(function ($validator) use ($cuit) {
            if (DatoPersonal::where('cuit', $cuit)->exists()) {
                $validator->errors()->add(
                    'cuit',
                    'El CUIT ya existe en la base de datos.'
                );
            }
        });

        $validator->validate();

        $datoPersonal = DatoPersonal::create([
            'nombre' => $input['nombre'],
            'apellido' => $input['apellido'],
            'cuit' => $cuit,
            'fechaNacimiento' => $input['fecha'],
            'idGenero' => $input['genero'],
            'idNacionalidad' => $input['nacionalidad']
        ]);

        return $datoPersonal->idDatosPersonales;
    }

    public function create(array $input)
    {
        $idDatosPersonales = $this->create_datos($input);

        $usuario = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'idDatosPersonales' => $idDatosPersonales,
        ]);

        HistorialUsuario::create([
            'idUsuarios' => $usuario->idUsuarios,
        ]);

        return $usuario;
    }
}
