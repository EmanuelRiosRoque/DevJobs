<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public function render()
    {
        $salarios = Salario::all();
        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios
        ]);
    }
}
