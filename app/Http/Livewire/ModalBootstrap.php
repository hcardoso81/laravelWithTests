<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalBootstrap extends Component
{
    protected $listeners = ['display-modal' => 'toggleModal'];

    public function toggleModal(): void
    {
        $this->dispatchBrowserEvent('show-modal');
    }
    public function render()
    {
        return view('livewire.modal-bootstrap');
    }
}
