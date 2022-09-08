<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParentComponent extends Component
{
    public $activities = [];

    public function mount()
    {
        // create a random activity
        $this->activities = [
            'James placed a bid',
            'Tom placed a bid',
            'Sam placed a bid',
            'Rick placed a bid',
            'Tom placed a bid',
            'James placed a bid of $50,000',
        ];
    }

    public function render()
    {
        return view('livewire.parent-component');
    }
}
