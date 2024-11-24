<?php

namespace App\Notifications;

use App\Models\ListBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptRescheduleNotification extends Notification
{
    use Queueable;
    protected $listBooking;
    /**
     * Create a new notification instance.
     */
    public function __construct(ListBooking $listBooking)
    {
        //
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
        return [
            'booking_id' => $this->listBooking->id,
            'date' => $this->listBooking->formatted_date,
            'session' => $this->listBooking->formatted_session,
            'message' => 'Pesanan dengan id ' . $this->listBooking->booking->id . ' telah diterima untuk ubah jadwal',
            'type' => 'Ubah Jadwal'
        ];
    }
}