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
        try {
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
                'name' => ['required', 'string', 'max:100', 'unique:users'],
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
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error al crear datos personales: ' . $e->getMessage());

            throw new \Exception('Error al procesar los datos personales. Por favor, intente nuevamente.');
        }
    }

    public function create(array $input)
    {
        try {
            DB::beginTransaction();

            $idDatosPersonales = $this->create_datos($input);

            $usuario = User::create([
                'username' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'idDatosPersonales' => $idDatosPersonales,
            ]);

            HistorialUsuario::create([
                'idUsuarios' => $usuario->idUsuarios,
            ]);

            DB::commit();

            return $usuario;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error al crear usuario: ' . $e->getMessage());

            throw new \Exception('Error al crear el usuario. Por favor, intente nuevamente.');
        }
    }
}
