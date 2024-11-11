<?php

namespace App\Listeners;

use App\Events\SparingCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTeamNameUser implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SparingCreated $event): void
    {
        $user = User::find($event->id_user);
        $user->team = $event->team_name;
        $user->save();
    }
}
