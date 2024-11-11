<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveBooking extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $booking;
    protected $total;
    protected $field;
    protected $type;

    public function __construct($booking, $total, $field, $type = "admin_approve_booking")
    {
        $this->booking = $booking;
        $this->total = $total;
        $this->field = $field;
        $this->type = $type;
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
            'order_date' => $this->booking->order_date,
            'uploud_payment' => $this->booking->uploud_payment,
            'list_bookings' => $this->booking->listBooking,
            'rented_by' => $this->booking->rentedBy->name,
            'username' => $this->booking->rentedBy->username,
            'address' => $this->booking->rentedBy->address,
            'no_telp' => $this->booking->rentedBy->no_telp,
            'email' => $this->booking->rentedBy->email,
            'total' => $this->total,
            'field' => $this->field->name,
            'type' => $this->type,
        ];
    }
}
