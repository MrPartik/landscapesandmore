<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sName;
    public $mBody;

    /**
     * Create a new message instance.
     *
     * @param $sName
     * @param $mBody
     */
    public function __construct($sName, $mBody)
    {
        $this->mBody = $mBody;
        $this->sName = $sName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.response-mail')
            ->with([
                'name' => $this->sName,
                'body' => $this->mBody
            ]);
    }
}
