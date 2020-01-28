@extends('admin/layouts/main')

@section('admin-body')

@push('styles')
  <link rel="stylesheet" href="{{asset("css/users.css")}}">
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
                    <div class="modal-header">
                      <h3 class="modal-title m-auto pl-5">NOVO USUÁRIO</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/addUserFormSubmit" method="POST">
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
                            <input type="text" name="login" class="form-control" placeholder="Usuário de acesso">
                          </div>
                          <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Senha de acesso">
                          </div>
                          <div class="form-group">
                            <label>Confirmar senha</label>
                            <input type="password" name="confpassword" class="form-control" placeholder="Confirme a senha de acesso">
                          </div>
                          <div class="form-group">
                            <label>Perfil</label>
                            <select name="profile" class="form-control">
                              <option selected>Selecione</option>
                              <option value="1">Administrador</option>
                              <option value="2">Desativado</option>
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
        </div><hr>
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
    </div>
    <div class="table-responsive">
      <table class="table border bg-white mt-2 text-center">
        <thead class="border bg-secondary text-white">
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Data Cadastro</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!--RETORNAR DADOS DO BANCO-->
            @foreach ($data as $listUser)   
          <td><span class="d-inline text-truncate">{{$listUser->nome}}</span></td>
            <td><span class="d-inline text-truncate">{{$listUser->emailAdmin}}</span></td>
            <td><span class="d-inline text-truncate">{{$listUser->dataCad}}</span></td>
            @endforeach
          </tr>
        </tbody>
      </table>  
    </div>
</div>
    @parent
@endsection

@push('script-bottom')
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
@endpush