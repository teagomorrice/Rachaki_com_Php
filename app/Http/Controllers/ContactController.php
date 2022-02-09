<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Mail\ContactMail;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact-us');
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->nome,
            'email' => $request->email,
            'mensagem' => $request->mensagem
        ];

        Mail::to('rachakicontato@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Sua mensagem foi enviada com sucesso!');
    }
}
