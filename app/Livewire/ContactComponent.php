<?php

namespace App\Livewire;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.contact-component')
            ->layout('layouts.app');
    }
}
