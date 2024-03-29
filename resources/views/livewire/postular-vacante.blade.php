<div class=" bg-gray-100 p-5 mt-10 flex justify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase  bg-green-100 rounded text-green-600 font-bold p-2 my-5 text-sm">
            {{session('mensaje')}}
        </div>
        @else

        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv" accept=".pdf"  wire:model="cv" />
            </div>

            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            <x-primary-button class="w-full justify-center mt-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif

</div>
