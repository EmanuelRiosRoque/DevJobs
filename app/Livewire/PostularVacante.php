<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];


    public function mount(Vacante $vacante){
        // dd($vacante);
    }

    public function postularme() {
        // Almacenar CV en el disco duro
        $datos = $this->validate();

        // Almacenar la imagen
        $cv = $this->cv->store('public/cv');
        // Esto nos ayuda a solamente extraer el nombre del la imagen y no toda la ruta
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear candidato vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);


        $this->vacante->reclutador->notify(new NuevoCandidato(
            $this->vacante->id,
            $this->vacante->titulo,
            auth()->user()->id
        ));

        // Mostrar al usuario de que se envio correctamente
        session()->flash('mensaje', 'Se envio correctamente tu informacion mucha suerte');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
