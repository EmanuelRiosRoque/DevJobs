<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Nuestras vacantes disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 ">
                @forelse ($vacantes as $vacante )
                    <div class="md:flex md:justify-between md:items-center py-6 divide-y divide-gray-200">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600 mb-2    " href="{{route("vacantes.show", $vacante->id)}}">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base mb-1">Empresa: {{$vacante->empresa}}</p>
                            <p class="text-sm text-gray-600">
                                Ultimo dia para postularse:
                                <span class="text-gray-600 font-bold">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a
                                class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center"
                                href="{{route("vacantes.show", $vacante->id)}}"
                            >
                                Ver Vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
