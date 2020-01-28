<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users\ListUsers;

class UsersController extends Controller
{
    public function addUserformSubmit(Request $req){
        
        //Validar dados entrada
        $req->validate([

            'name'=>'required | min:2',
            'email'=>'required | email',
            'password'=>'required',
            'confpassword'=>'required | same:password',
            'profile'=>'required'
        ],
        [
            'name.required'    => 'Campo nome é obrigatório!',
            'email.required'      => 'Campo E-mail é obrigatório!',
            'password.required' => 'Campo senha é obrigatório!',
            'confpassword.required' => 'Campo confirmar senha é obrigatório!',
            'confpassword.same' => 'Senhas não são iguais!',
            'profile' => 'Perfil é necessário para cadastro!',
        ] 
    );
        
    return redirect('administracao/usuarios')->with('success_msg','Usuário cadastrado com sucesso!');

    }

    //CRIE A FUNÇÃO QUE PEGA OS DADOS DO BANCO
    function listUsers(){
        
        //LISTAR TODOS OS DADOS DA TABELA E RETORNAR PARA VARIÁVEL DATA
        $data = ListUsers::all();
        return view('admin/users',['data'=>$data]);
    }
}
