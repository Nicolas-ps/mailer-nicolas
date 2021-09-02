<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        if ($request->file('file-upload')) {
            $nameFile = $request->file('file-upload')->getClientOriginalName();
        }

        $subject = $request->email_subject;

        $this->subject($subject);
        $this->to($request->email_destinate, $request->name);

        $email = $this->markdown('mail.mail', [
            'name' => $request->name,
            'email_destinate' => $request->email_destinate,
            'email_subject' => $request->email_subject,
            'email_body' => $request->email_body
        ]);

        if($request->file('file-upload')){
            $email->attachFromStorage($nameFile);
        }

    }
}