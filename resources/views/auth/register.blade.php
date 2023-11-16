<x-guest-layout>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
    <x-input-error :messages="$errors->get('rol')" class="mt-2" />
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('¿Que tipo de Cuenta deseas en DevJobs?')" />

            <select name="rol" id="rol" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Opcion..</option>
                <option value="1">Developer - Obtener Empleo</option>
                <option value="2">Reclutador - Publicar Empleos</option>
            </select>
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>

            <x-link :href="route('password.request')">
                Olvidaste tu password
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Registarte') }}
        </x-primary-button>
    </form>
</x-guest-layout>
