<?php

namespace App\Http\Controllers;

use App\Mail\PruebaCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailController extends Controller
{
    public function prueba() {
        try {
            Mail::to(Auth::user()->email)->send(new PruebaCorreo);
            $retorno = 'success';
            $mensaje = 'Correo de prueba enviado correctamente';
            return redirect(route('home'))->with($retorno, $mensaje);
        } catch (Throwable $e) {
            $retorno = 'error';
            $mensaje = $e->getMessage();
            return redirect(route('home'))->with($retorno, $mensaje);
        }
    }
}
