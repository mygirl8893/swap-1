<?php

namespace App\Mail;

use App\Judite\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user to be confirmed.
     *
     * @var string
     */
    private $user;

    /**
     * Create a new message instance.
     *
     * @param  \App\Safira\Models\User  $user
     * @param  string  token
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->user->name;
        $token = $this->user->verification_token;
        $confirmationUrl = route('register.confirm', compact('token'));

        return $this->markdown('emails.registrations.confirm', compact('name', 'confirmationUrl'));
    }
}
