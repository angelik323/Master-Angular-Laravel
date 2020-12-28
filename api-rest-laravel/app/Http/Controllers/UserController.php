<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function pruebas(Request $request)
    {
        return "Acción de pruebas de USER-CONTROLLER";
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            //Crear el usuario
            $user = new User();
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->password = $password;

            //Guardar el usuario
            $user->save();

            return response('Exitoso', 200)->header('Content-Type', 'text/plain');
        } catch (Throwable $e) {
            return response('Error', 500)->header('Content-Type', 'text/plain');
        }

    }


    /*
    //Recoger los datos del usuario por Post
    $json = $request->input('json', null);
    $params = json_decode($json); //me saca un objeto
    $params_array = json_decode($json, true); //array


    if(!empty($params) && (!empty($params_array){

        //Limpiar datos
        $params_array = array_map('trim', $params_array);

        //Validar los datos
        $validate = \Validator::make($params_array, [
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'email' => 'required|email|unique:users', //Comprobar si el usuario existe ya (duplicado)
            'password' => 'required'
        ]);

        if ($validate -> fails()) {
        //La validación ha fallado
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no se ha creado',
                'errors' => $validate->errors()
                );
        }else{ //validación pasada correctamente

            //Cifrar la contraseña
            $pwd = password_hash($params->password, PASWORD_BCRYPT, ['cost' => 4]);

            //Crear el usuario
            $user = new User();
            $user->name = $params_array['name'];
            $user->surname = $params_array['surname'];
            $user->email = $params_array['email'];
            $user->password = $pwd;
            $user->role = 'ROLE_USER';

            //Guardar el usuario
            $user->save();

            $data = array(
                'estatus' => 'success',
                'code' => 200,
                'message' => 'El usuariose ha creado correctamente',
                'user' => $user
            );
        }
    }else{
        $data = array(
            'status' => 'error',
            'code' => 404,
            'message' => 'Los datos enviados no son correctos'
        );
    }



    //return response()->json($data, $data['code']);

}
        */

    public function login(Request $request)
    {
        return "Acción de login de usuario";
    }


}
