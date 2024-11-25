<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form class='sm:grid sm:grid-cols-2 gap-6 mt-4' method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <div class="mt-4">
                    <x-label for="nombre" value="{{ __('Nombre') }}" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                        autofocus autocomplete="nombre" />
                </div>

                <div class="mt-4">
                    <x-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')"
                        autofocus autocomplete="apellido" />
                </div>

                <div class="mt-4">
                    <x-label for="cuit" value="{{ __('Cuit') }}" />
                    <div class="flex gap-2 items-center">
                        <x-input id="cuit" class="block mt-1 w-[24%]" type="text" maxlength="2" name="cuit1"
                            :value="old('cuit1')" autofocus autocomplete="cuit1" />
                        -
                        <x-input id="cuit" class="block mt-1 w-[60%]" type="text" maxlength="8" name="cuit2"
                            :value="old('cuit2')" autofocus autocomplete="cuit2" />
                        -
                        <x-input id="cuit" class="block mt-1 w-[17%]" type="text" maxlength="1" name="cuit3"
                            :value="old('cuit3')" autofocus autocomplete="cuit3" />
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-white dark:text-gray-200" for="nacionalidad">Nacionalidad</label>
                    <select id="nacionalidad" name="nacionalidad"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($nacionalidades as $pais)
                            <option value="{{ $pais['idNacionalidad'] }}"
                                {{ old('nacionalidad') == $pais['idNacionalidad'] ? 'selected' : '' }}>
                                {{ $pais['abreviacion'] . ', ' . $pais['nacion'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label class="text-white dark:text-gray-200" for="genero">Genero</label>
                    <select id="genero" name="genero"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($generos as $genero)
                            <option value="{{ $genero['idGenero'] }}"
                                {{ old('genero') == $genero['idGenero'] ? 'selected' : '' }}>
                                {{ $genero['nombreGenero'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="fecha" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')"
                        autofocus autocomplete="fecha" />
                </div>
            </div>

            <div>
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Usuario') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4 col-span-2">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Ya se encuentra registrado?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
