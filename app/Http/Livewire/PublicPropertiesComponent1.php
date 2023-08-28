<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PublicPropertiesComponent1 extends Component
{
    //declare property public
    public $messages = 'Texto desde property public $messages';

    public $textBinding;

    public function render()
    {
        return view('livewire.public-properties-component1');
    }
}
