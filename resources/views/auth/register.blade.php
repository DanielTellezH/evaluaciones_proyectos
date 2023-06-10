<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Nombre completo -->
        <div>
            <x-input-label for="name" :value="__('Nombre completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Matricula -->
        <div class="mt-4">
            <x-input-label for="matricula" :value="__('Matricula')" />
            <x-text-input id="matricula" class="block mt-1 w-full" type="number" name="matricula" maxlength="10" :value="old('matricula')"  />
            <x-input-error :messages="$errors->get('matricula')" class="mt-2" />
        </div>

        <!-- Grupo -->
        <div class="mt-4">
            <x-input-label for="grupo" :value="__('Grupo')" />
            <x-text-input id="grupo" class="block mt-1 w-full" type="text" name="grupo" maxlength="5" :value="old('grupo')" />
            <x-input-error :messages="$errors->get('grupo')" class="mt-2" />
        </div>

        <!-- Carrera -->
        <div class="mt-4">
            <x-input-label for="carrera" :value="__('Carrera')" />
            <select name="carrera" id="carrera" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">Selecciona una carrera </option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->descripcion }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('carrera')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        @if (Session::has('mensaje'))
            <x-input-error :messages="Session::get('mensaje')" class="mt-2 text-green-700" />
        @endif

        <div class="flex items-center justify-between flex-col-reverse mt-8 gap-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="w-full justify-center">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

{{-- 
    Matricula
    Grupo
    Carrera
    --}}

