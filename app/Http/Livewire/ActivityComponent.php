<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActivityComponent extends Component
{
    public $activities;

    protected $listeners = ['createBid' => 'handleCreateBid'];

    public function render()
    {
        return view('livewire.activity-component');
    }
    public function handleCreateBid()
    {
        $this->activities[] = 'James placed a bid';
    }
}
