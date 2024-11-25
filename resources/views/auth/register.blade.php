<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form class='grid grid-cols-1 gap-6 mt-4' method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <div class="mt-4">
                    <x-label for="nombre" value="{{ __('Nombre') }}" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                        required autofocus autocomplete="nombre" />
                </div>

                <div class="mt-4">
                    <x-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-input id="apellido" class="block mt-1 w-full" type="text" name="name" :value="old('apellido')"
                        required autofocus autocomplete="apellido" />
                </div>

                <div class="mt-4">
                    <x-label for="cuit" value="{{ __('Cuit') }}" />
                    <x-input id="cuit" class="block mt-1 w-full" type="text" name="cuit" :value="old('cuit')"
                        required autofocus autocomplete="cuit" />
                </div>

                <div class="mt-4">
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Nacionalidad</label>
                    <select
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($nacionalidades as $pais)
                            <option>{{ $pais['abreviacion'] . ', ' . $pais['nacion'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Genero</label>
                    <select
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($generos as $genero)
                            <option>{{ $genero['nombreGenero'] }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mt-4">
                    <x-label for="fecha" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')"
                        required autofocus autocomplete="fecha" />
                </div>
            </div>

            <div>
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Usuario') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

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
