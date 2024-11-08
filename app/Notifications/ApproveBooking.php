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
    public function __construct($booking, $total, $field)
    {
        $this->booking = $booking;
        $this->total = $total;
        $this->field = $field;
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
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

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
            'field' => $this->field->name
        ];
    }
}
