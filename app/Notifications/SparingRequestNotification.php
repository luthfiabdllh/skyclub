<?php

namespace App\Notifications;

use App\Models\SparingRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SparingRequestNotification extends Notification
{
    use Queueable;
    protected $sparing_request;
    protected $owner;
    /**
     * Create a new notification instance.
     */
    public function __construct(SparingRequest $sparing_request, $owner = false)
    {
        $this->sparing_request = $sparing_request;
        $this->owner = $owner;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $message = 'Permintaan sparing dengan id ' . $this->sparing_request->id . ' telah diajukan';
        if ($this->owner) {
            $message = 'Terdapat permintaan sparing dengan id ' . $this->sparing_request->id . ' yang belum direspon';
        }
        return [
            'team1' => $this->sparing_request->sparing->createdBy->team,
            'team2' => $this->sparing_request->user->team,
            'created_at' =>  $this->sparing_request->created_at,
            'schedule' => $this->sparing_request->sparing->listBooking->formatted_date,
            'session' => $this->sparing_request->sparing->listBooking->formatted_session,
            'field' => $this->sparing_request->sparing->listBooking->field->name,
            'message' => $message,
            'type' => "Pengajuan Sparing",
        ];
    }
}
