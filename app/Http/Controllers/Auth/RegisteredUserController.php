<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller{
    
    /**
     * Display the registration view.
     */
    public function create(): View{
        $carreras = Carrera::all();

        $context = [
            'carreras' => $carreras,
        ];

        return view('auth.register', $context);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse{

        $messages = [
            'name.required' => 'El campo del nombre es requerido.',
            'email.required' => 'El campo del correo es requerido.',
            'matricula.digits_between' => 'La matricula tiene que ser a diez digitos.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'matricula' => ['required', 'numeric', 'max:10'],
            'matricula' => ['required', 'numeric', 'digits_between:1,10'],
            'grupo' => ['required', 'string', 'max:5'],
            'carrera' => ['required', 'numeric'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'matricula' => $request->matricula,
            'grupo' => $request->grupo,
            'carrera_id' => $request->carrera,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        Session::flash('mensaje', '¡Registro exitoso! Espera la activación de tu cuenta, lo hará tu profesor.');

        return redirect()->back();
        // return redirect(RouteServiceProvider::HOME);
    }
}
