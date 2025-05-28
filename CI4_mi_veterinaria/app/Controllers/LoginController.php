<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function login()
    {
        return view('autenticacion/login'); //retorna la view login
    }

    public function autenticar()
    {
        $usuario = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');

        // Lógica de autenticación sin base de datos(puede ser con base de datos, hardcoded por ahora...)
        if ($usuario === 'admin' && $clave === '1234') {
            session()->set('usuario_id', 1); // Guardamos el id de usuario
            session()->set('usuario_nombre', 'Administrador');
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
