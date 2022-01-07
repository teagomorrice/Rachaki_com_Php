<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Historico;

class Registro extends Component
{
    public function render()
    {
        $historicos = Historico::all();
        return view('livewire.registro', ['historicos' => $historicos]);
    }
}
