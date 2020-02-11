<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users\ListUsers;
use App\Users\InsertUser;
use App\Users\DisableUser;
use App\System\ListProfile;
use App\Users\EditUser;
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
            // $user->senha = bcrypt($req->password);
            $user->situacao = (1);
            $user->emailAdmin = Helper::lowerCase($req->email);
            $user->dataCad = now();
            $user->dataMod = null;
            $user->dataDes = null;
            $user->fkIdPerfil = $req->profile;
            $user->save();
            return redirect('administracao/usuarios')->with('success_msg','Usuário(a) '. $user->nome .' adicionado(a)!');

        }catch(\Exception $e){
            return redirect('administracao/usuarios')->with('error_msg','Falha ao cadastrar usuário!', $e);
        }
    }

    //LISTAR USUÁRIOS CADASTRADOS NO BANCO na PÁGINA USUÁRIOS
    function usersPage(){

        //LISTAR TODOS OS USUÁRIOS E SEUS PERFIS
        $users = ListUsers::join('tb_perfil','tb_usuario.fkIdPerfil','=','tb_perfil.idPerfil')
            ->where('situacao','1')
            ->orderBy('usuario','asc')
            ->get();

        //LISTAR DADOS DO PERFIL PARA O SELECT DO FORM ADD USUARIO
        $profiles = ListProfile::all();

        $dados = array($users,$profiles);

        return view('admin/users',['users'=> $dados[0], 'profiles' => $dados[1]]);

        //LISTAR TODOS OS DADOS DA TABELA E RETORNAR PARA VARIÁVEL DATA
    }

    //********************* UPDATE SITUACAO O USUÁRIO ***********************
    function disableUser($id, $nomeUser){

        try{
            //UPDATE DA SITUAÇÃO DO USUARIO PARA O VALOR 1
            DisableUser::where('idUsuario',$id)->update(['situacao'=>'0']);
            //$post->situacao = '0';
            return redirect('administracao/usuarios')->with('success_msg','Usuário '. $nomeUser .' desativado!');
        }catch(\Exception $e){

            return redirect('administracao/usuarios')->with('error_msg','Falha em desativar o usuário!');
        }
    }

    public function editUserFormSubmit(Request $req){

        //Validar dados entrada
        $this->validate($req, [

            'name'          =>'required | min:2',
            'email'         =>'required | email',
            'user'          =>'required',
            'profile'       =>'required'
        ],
        [
            'name.required'         => 'Campo nome é obrigatório!',
            'email.required'        => 'Campo E-mail é obrigatório!',
            'user.required'         => 'Campo usuário é obrigatório!',
            'profile'               => 'Perfil é necessário para cadastro!',
        ]
        );

        try{

            EditUser::where('idUsuario',$req->id)
            ->update([
                'nome'          => Helper::upperCase($req->name),
                'usuario'       => ($req->user),
                'emailAdmin'    => Helper::lowerCase($req->email),
                'dataMod'       => now(),
                'fkIdPerfil'    => $req->profile,
            ]);

            return redirect('administracao/usuarios')->with('success_msg','Dados alterados!');

        }catch(\Exception $e){
            return redirect('administracao/usuarios')->with('error_msg','Falha em alterar dados!', $e);
        }
    }

}
