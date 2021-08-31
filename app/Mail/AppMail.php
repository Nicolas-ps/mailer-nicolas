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
        $nameFile = $request->file('file-upload')->getClientOriginalName();
        $path = storage_path()."/public";

        $year = $request->year;
        $month = $request->month;

        $subject = $request->name . " - Relatório de " . $month . " de " . $year . ".";

        $this->subject($subject);
        $this->to($request->email_destinate, $request->name);

        $this->markdown('mail.mail', [
            'name' => $request->name,
            'email_destinate' => $request->email_destinate,
            'year' => $year,
            'month' => $month
        ])->attachFromStorage($nameFile);

    }
}