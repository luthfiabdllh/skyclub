<?php

namespace App\Listeners;

use App\Events\PaymentUplouded;
use Illuminate\Support\Facades\DB;
use App\Notifications\ApproveBooking;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendApproveBookingToAdmin implements ShouldQueue
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
    public function handle(PaymentUplouded $event): void
    {
        Notification::send($event->admins, new ApproveBooking($event->booking, $event->total, $event->field));
        DB::table('jobs')
            ->where('available_at', '>', now())
            ->where('payload', 'LIKE', '%UpdateBookingStatus%')
            ->delete();
    }
}
