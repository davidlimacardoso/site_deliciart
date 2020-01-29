@extends('admin/layouts/main')

@section('admin-body')

@push('styles')
  <link rel="stylesheet" href="{{asset("css/users.css")}}">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endpush
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="">USUÁRIOS</h2>
            </div>

            <!--Botao Modal add novo usuário-->
                <div class="p-2">
                    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalAddUser">
                        <i class="fas fa-plus"></i><span></span>
                    </button>
                </div>
            <!--Modal add novo usuário-->
            <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-success text-center">
                      <h3 class="modal-title m-auto pl-5 text-white">&ThinSpace; NOVO USUÁRIO</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="addUserForm" class="needs-validation" action="/addUserFormSubmit" method="POST">
                        @csrf
                          <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome completo do usuário">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do usuário">
                          </div>
                          <div class="form-group">
                            <label class="">Usuário</label>
                            <input type="text" name="user" class="form-control" placeholder="Usuário de acesso">
                          </div>
                          <div class="form-group">
                            <label>Senha</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Senha de acesso">
                          </div>
                          <div class="form-group">
                            <label>Confirmar senha</label>
                            <input id="confPassword" type="password" name="confpassword" class="form-control" placeholder="Confirme a senha de acesso">
                          </div>
                          <div class="form-group">
                            <label>Perfil</label>
                            <select name="profile" class="form-control custom-select">
                              <option value="" selected>Selecione</option>
                              @foreach ($profiles as $perfil)
                            <option value="{{$perfil->idPerfil}}">{{$perfil->nomePerfil}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>

                      </form>
                  </div>
                </div>
              </div>
            <!--FIM modal add novo usuário-->
        </div>
        <!--ALERT-->
        @include('partials/_msg')  

        <!--ALERT VALIDAÇÃO USUÁRIO-->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="table-responsive">
          <table id="tableUsers" class="table border bg-white mt-2 text-center">
            <thead class="border bg-secondary text-white rounded">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Data Cadastro</th>
              </tr>
            </thead>
            <tbody>
              <!--RETORNAR DADOS DO BANCO-->
              @foreach ($users as $user)   
              <tr>
              <td><span class="d-inline text-truncate">{{$user->nome}}</span></td>
                <td><span class="d-inline text-truncate">{{$user->emailAdmin}}</span></td>
                <td><span class="d-inline text-truncate">{!! Helper::formatDatetimeBr($user->dataCad) !!}</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>  
        </div>
    </div>
    </div>
    @parent
@endsection

@push('script-bottom')
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('js/myValidations.js')}}"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
    $('#tableUsers').DataTable();
} );
  </script>
@endpush