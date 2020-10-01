<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function login(Request $request){  // Verifica se o usuário digitou ou não o email e a senha
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [ // Credenciais checa se o que o usuário digitou é igual ao que ta na base de dados
            'email' => $request->email,
            'password' => $request->password
        ];

        // Guarda um true ou false dentro da variável authOK
        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);

        if ($authOK){ // Se ta tudo okay, manda o usuário para a rota admin.dashboard
            // inteded() redirecionará o usuário para a URL que ele estava tentando acessar antes de ser captuado pelo filtro de autenticação
            return redirect()->intended( route('admin.dashboard'));
        }   

        // Se o login está errado, redireciona para uma pagina pra tras, recuperando as informações q ele colocou
        return redirect()->back()->withInputs($request->only('email', 'remember'));

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
    }

    public function index(){ // Retorna para a view do 'admin-login' dentro da pasta auth
        return view('auth.admin-login');
    }
}
