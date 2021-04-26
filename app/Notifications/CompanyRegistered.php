<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyRegistered extends Notification
{
    use Queueable;

    private $company;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('Company is registered'))
            ->line(__('Your company:'))
            ->line($this->company->title)
            ->line(__('is registered in EmloyeeList!'))
            ->action(
                __('Go To Company List'),
                route(
                    'company.index',
                    [app()->getLocale(), $this->company->id]
                )
            )
            ->salutation(__('Tank You for using our application'));

    }
}
