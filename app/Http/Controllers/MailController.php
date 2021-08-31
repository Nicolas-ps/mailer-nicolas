<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispairRequest;
use App\Mail\AppMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function index ()
    {
        return view('form');
    }

    public function dispair (DispairRequest $request)
    {
        $file = $request->file('file-upload');
        $nameFile =  $file->getClientOriginalName();
        $file->storeAs('./',$nameFile);

        Mail::send(new AppMail);

        Storage::delete($nameFile);
        
        return redirect()->route('index')->with('statusSend', 'E-mail enviado com sucesso!');
    }

}