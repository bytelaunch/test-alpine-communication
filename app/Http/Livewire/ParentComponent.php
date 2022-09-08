<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class ParentComponent extends Component
{
    public $activities = [];

    public function mount()
    {
        // create a random activity
        $activityStrings = [
            'James placed a bid',
            'Tom placed a bid',
            'Sam placed a bid',
            'Rick placed a bid',
            'Tom placed a bid',
            'James placed a bid of $50,000',
        ];

        $activities = collect($activityStrings)->map(function ($activityString) {
            $receivedAt = now()->subSeconds(rand(1, 60 * 10));
            return [
                'key' => Str::random(4),
                'activityString' => $activityString,
                'receivedAt' => $receivedAt,
                'receivedAtHuman' => $receivedAt->format('D H:i:s'),
            ];
        });
        $activities = $activities->sortBy('receivedAt')->values()->toArray();

        $this->activities = $activities;
    }

    protected $listeners = ['createBid' => 'handleCreateBid'];

    public function render()
    {
        return view('livewire.parent-component');
    }

    public function handleCreateBid()
    {
        $this->activities[] = 'James placed a bid';
    }
}
