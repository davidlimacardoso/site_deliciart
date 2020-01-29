<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users\ListUsers;
use App\Users\InsertUser;
use App\System\ListProfile;
use Helper;     //HELPER FUNÇÕES PRÓPRIAS

class UsersController extends Controller
{
    public function addUserformSubmit(Request $req){
        
        //Validar dados entrada
        $this->validate($req, [

            'name'          =>'required | min:2',
            'email'         =>'required | email',
            'password'      =>'required',
            'user'          =>'required',
            'confpassword'  =>'required | same:password',
            'profile'       =>'required'
        ],
        [
            'name.required'         => 'Campo nome é obrigatório!',
            'email.required'        => 'Campo E-mail é obrigatório!',
            'password.required'     => 'Campo senha é obrigatório!',
            'confpassword.required' => 'Campo confirmar senha é obrigatório!',
            'user.required'         => 'Campo usuário é obrigatório!',
            'confpassword.same'     => 'Senhas não são iguais!',
            'profile'               => 'Perfil é necessário para cadastro!',
        ]
        );
       
        try{

            $user = new InsertUser;
            $user->nome = Helper::upperCase($req->name);
            $user->usuario = $req->user;
            $user->senha = bcrypt($req->password);
            $user->situacao = (1);
            $user->emailAdmin = Helper::lowerCase($req->email);
            $user->dataCad = now();
            $user->dataMod = null;
            $user->dataDes = null;
            $user->fkIdPerfil = $req->profile;
            $user->save();
            return redirect('administracao/usuarios')->with('success_msg','Usuário cadastrado com sucesso!');

        }catch(\Exception $e){
            return redirect('administracao/usuarios')->with('error_msg','Falha ao cadastrar usuário!', $e);
        }
    }

    //LISTAR USUÁRIOS CADASTRADOS NO BANCO na PÁGINA USUÁRIOS
    function usersPage(){
        
        //LISTAR TODOS OS DADOS DA TABELA E RETORNAR PARA VARIÁVEL DATA
        $users = ListUsers::orderBy('usuario','asc')->get();
        $profiles = ListProfile::all();
        
        $dados = array($users,$profiles);

        return view('admin/users',['users'=> $dados[0], 'profiles' => $dados[1] ]);

        //LISTAR TODOS OS DADOS DA TABELA E RETORNAR PARA VARIÁVEL DATA
    }

}
