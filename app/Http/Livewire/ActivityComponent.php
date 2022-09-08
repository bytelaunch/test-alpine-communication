<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class ActivityComponent extends Component
{
    public $activities;

    protected $listeners = [
        'createBid' => 'handleCreateBid',
    ];

    public function render()
    {
        return view('livewire.activity-component');
    }
    public function handleCreateBid()
    {
        sleep(2);
        $activityString = 'James placed a bid (from Server)';
        $receivedAt = now()->subSeconds(rand(1, 60 * 10));

        $this->processNewActivity($activityString, $receivedAt);

    }

    public function createActivity($activityString)
    {
        $receivedAt = now()->subSeconds(rand(1, 60 * 10));

        $this->processNewActivity($activityString, $receivedAt);
    }

    private function removeClientSideActivities($activities)
    {
        return collect($activities)->filter(function ($activity) {
            return ! Str::contains($activity['receivedAtHuman'], 'now');
        })->values()->toArray();
    }

    /**
     * @param $activityString
     * @param \Illuminate\Support\Carbon $receivedAt
     * @return void
     */
    public function processNewActivity($activityString, \Illuminate\Support\Carbon $receivedAt): void
    {
        $activities = $this->activities;

        $activities[] = [
            'key' => Str::random(4),
            'activityString' => $activityString,
            'receivedAt' => $receivedAt,
            'receivedAtHuman' => $receivedAt->format('D H:i:s'),
        ];

        $activities = collect($activities)->sortBy('receivedAt')->values()->toArray();

        $this->activities = $this->removeClientSideActivities($activities);
    }
}
