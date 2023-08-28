<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormModalSweetAlertComponent extends Component
{
    public $name;
    public $email;
    public $paramValue = "";

    //listen events, [name=>function] or [name] if =[name=>name]
    protected $listeners = ['resetForm' => 'resetData', 'showAlertSweet'];


    public function save(): void
    {

        $this->emit('success');
    }

    public function showAlertSweet(): void
    {
        $error = true;
        if (!$error)
            $this->dispatchBrowserEvent('swal-sucess', [
                'title' => 'Formulario enviado exitosamente',
                'icon' => 'success'
            ]);
        else {
            $this->dispatchBrowserEvent('swal-sucess', [
                'title' => 'Ha ocurrido un error',
                'icon' => 'error'
            ]);
        }
    }

    public function resetData(String $param): void
    {
        $this->reset();
        $this->paramValue = $param;
    }

    public function render()
    {
        return view('livewire.form-modal-sweet-alert-component');
    }
}
