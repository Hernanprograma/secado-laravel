<?php

namespace proyectoPrueba\Http\Controllers;

use proyectoPrueba\User;
use proyectoPrueba\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
//use Auth;



class RegisterController extends Controller {

    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

    public function showRegistrationForm()
  {
    return View('admin.createuser');
  }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
  public function create(Request $request){

    $rules = [
     'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
     'email' => 'required|email|max:255|unique:users,email',
     'password' => 'required|min:6|max:18|confirmed',
    ];

    //Posibles mensajes de error de validación
    $messages = [
     'name.required' => 'El campo es requerido',
     'name.min' => 'El mínimo de caracteres permitidos son 3',
     'name.max' => 'El máximo de caracteres permitidos son 16',
     'name.regex' => 'Sólo se aceptan letras',
     'last_name.required' => 'El campo es requerido',
     'last-name.required' => 'Sólo se aceptan letras',
     'email.required' => 'El campo es requerido',
     'email.email' => 'El formato de email es incorrecto',
     'email.max' => 'El máximo de caracteres permitidos son 255',
     'email.unique' => 'El email ya existe',
     'password.required' => 'El campo es requerido',
     'password.min' => 'El mínimo de caracteres permitidos son 6',
     'password.max' => 'El máximo de caracteres permitidos son 18',
     'password.confirmed' => 'Los passwords no coinciden',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    //Si la validación no es correcta redireccionar al formulario con los errores
    if ($validator->fails()){
     return redirect()->back()->withErrors($validator);
    }
    else{ // De los contrario guardar al usuario


     $user = new User;
     $user->name = $request->name;
     $user->last_name=$request->last_name;
     $user->email = $request->email;
     $user->password = bcrypt($request->password);
     $user->user=$request->rol;


     //El valor 1 en la columna determina si el usuario es administrador o no


     if ($user->save()){
      return redirect()->back()->with('message', 'Enhorabuena nuevo Usuario creado correctamente');
     } else{
      return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
     }
    }


   return View('/');

 }
}
