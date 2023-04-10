<form class="md:w-1/2" action="">
    <!-- Email Address -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input
        id="titulo"
        class="block mt-1 w-full"
        type="text"
        name="titulo"
        :value="old('titulo')"
        placeholder="Titulo Vacante" />
    </div>

    <div>
        <x-input-label for="titulo" :value="__('Salario Mensual')" />
        <x-text-input
        id="titulo"
        class="block mt-1 w-full"
        type="text"
        name="titulo"
        :value="old('titulo')"
        placeholder="Titulo Vacante" />
    </div>

</form>
