<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Partida;
use App\Models\Historico;

class Principal extends Component
{
    public $posts = [];
    public $idPartida;

    public function render()
    {
        $partidas = Partida::all();
        return view('livewire.principal', ['partidas' => $partidas]);
    }

    public function cadastrarPartida(){
        $partida = Partida::create($this->posts);
        $this->posts['partida_id']=$partida->id;
        Historico::create($this->posts);
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');    
    }

    public function modalEdit(Partida $partida){
        $this->posts = $partida->toArray();
        return $this->dispatchBrowserEvent('openModalEdit'); 
    }

    public function editarPartida(){
        $partida= Partida::where('id', $this->posts['id'])->first();
        $historico = Historico::where('partida_id', $this->posts['id'])->first();
        $partida->update($this->posts);
        $historico->update($this->posts);
        return $this->dispatchBrowserEvent('closeModalEdit'); 
    }

    public function modalDelete($idPartida){
        $this->idPartida = $idPartida;
        return $this->dispatchBrowserEvent('openModalDelete'); 
    }

    public function deletarPartida(){
        Partida::where('id', $this->idPartida)->delete();
        return $this->dispatchBrowserEvent('closeModalDelete'); 
    }
}
