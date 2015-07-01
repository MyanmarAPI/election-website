<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Events\UserPasswordChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPasswordChangeNotification
{
    protected $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserPasswordChanged  $event
     * @return void
     */
    public function handle(UserPasswordChanged $event)
    {
        $user = $event->user;
        $subject = 'Password Changed';

        $data['user'] = $user;
        $data['subject'] = $subject;

        $this->mailer->send('emails.password-changed', 
            $data, 
            function ($m) use ($user, $subject) {
                $m->to($user->email, $user->name)->subject($subject);
        });
    }
}
