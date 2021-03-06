<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispairRequest;
use App\Mail\AppMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function dispair (DispairRequest $request)
    {
        if($request->file('file-upload')){
            $file = $request->file('file-upload');
            $nameFile =  $file->getClientOriginalName();
            $file->storeAs('./', $nameFile);
        }

        Mail::send(new AppMail);

        
        //Storage::delete($nameFile);
        
        
        return redirect()->route('dashboard')->with('statusSend', 'E-mail enviado com sucesso!');
    }
}
