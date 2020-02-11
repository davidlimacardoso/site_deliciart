@extends('admin/layouts/main')

@section('admin-body')

@push('styles')
  <link rel="stylesheet" href="{{asset("css/users.css")}}">

  <link rel="stylesheet" href="{{asset("api/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("api/DataTables/Buttons-1.6.1/css/buttons.bootstrap4.min.css")}}">

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
                        <i class="fas fa-user-plus"></i><span></span>
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
                            <option value="{{$perfil->id}}">{{$perfil->nomePerfil}}</option>
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
          <table id="userTable" class="table border mt-2 text-center table-sm">
            <thead class="border table-active rounded">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Perfil</th>
                <th scope="col">Cadastro</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <!--RETORNAR DADOS DO BANCO-->
              @foreach ($users as $user)
              <tr>
              <td><span class="d-inline text-truncate">{{$user->nome}}</span></td>
                <td><span class="d-inline text-truncate">{{$user->emailAdmin}}</span></td>
                <td><span class="d-inline text-truncate">{{$user->nomePerfil}}</span></td>
                <td><span class="d-inline text-truncate">{!! Helper::formatDatetimeBr($user->dataCad) !!}</span></td>
                {{-- <td><span class="d-inline text-truncate">

                        /*CHECA SE HÁ DATA DE MODIFICAÇÃO*/
                        $user->dataMod = (!isset($user->dataMod)) ? 'Sem modificações' : Helper::formatDatetimeBr($user->dataMod);

                </span></td> --}}
                <td>
                    <!--GROUP BUTTON-->
                    <div class="btn-group" role="group" aria-label="Exemplo básico">
                        <!--DISABLE USER-->
                        <button type="button" value="{{$user->idUsuario}}" class="btn btn-danger" data-toggle="modal" data-target="#modalDisUser" data-toggle="tooltip" title="Some tooltip text!">
                            <i class="fas fa-user-tag"></i>
                        </button>
                        <!-- MODAL CONF DESATIVAR USUÁRIO -->
                        <div class="modal fade" id="modalDisUser" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">AVISO!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4>Deseja desativar este usuário?</h4>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" role="button" href="{!! url('disableUser/'.$user->idUsuario.'/'.$user->nome) !!}">
                                        Confirmar
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <!-- EDITAR -->
                        <button type="button" value="{{$user->idUsuario}}" class="btn btn-success">
                            <i class="fas fa-user-tag"></i>
                        </button> --}}
                        <!--EDITAR-->
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary text-white" role="button" data-toggle="modal" data-target="#modalEditUser"
                                data-nome="{{$user->nome}}"
                                data-usuario="{{$user->usuario}}"
                                data-id="{{$user->id}}"
                                data-email="{{$user->emailAdmin}}"
                                data-situacao="{{$user->situacao}}"
                                data-perfil="{{$user->idPerfil}}">
                                <i class="fas fa-user-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <a class="" href="#!">Ver usuários desativados</a>
        </div>
    </div>
<!--MODAL-->
<!-- MODAL ALTERAR DADOS DO USUÁRIO -->
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">EDITAR DADOS DO USUÁRIO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" class="needs-validation" action="/editUserFormSubmit" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editId">
                      <div class="form-group">
                        <label>Nome</label>
                        <input id="editName" type="text" name="name" class="form-control" placeholder="Nome completo do usuário">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input id="editEmail" type="email" name="email" class="form-control" placeholder="E-mail do usuário">
                      </div>
                      <div class="form-group">
                        <label class="">Usuário</label>
                        <input id="editUser" type="text" name="user" class="form-control" placeholder="Usuário de acesso">
                      </div>
                      <div class="form-group">
                        <label>Senha</label>
                      <div class="input-group mb-3">
                        <input type="password" value="******" class="form-control" placeholder="Senha de acesso" disabled>
                        <div class="input-group-append">
                          <a href="#!" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Redefinir senha"><i class="fas fa-redo"></i></a>
                        </div>
                      </div>
                      </div>
                      <div class="form-group">
                        <label>Perfil</label>
                        <select id="editProfile" name="profile" class="form-control custom-select">
                          <option value="" selected>Selecione</option>
                          @foreach ($profiles as $perfil)
                        <option value="{{$perfil->id}}">{{$perfil->nomePerfil}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>

                  </form>
            </div>
            </div>
        </div>
    </div>
</div>


    @parent
@endsection

@push('script-bottom')
  <script src="{{asset('api/jQueryValidations/jquery.validate.min.js')}}"></script>
  <script src="{{asset('js/myValidations.js')}}"></script>
<!--SCRIPT DATATABLE-->
  <script src="{{asset("api/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("api/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.bootstrap4.min.js")}}"></script>
  <script src="{{asset("api/DataTables/JSZip-2.5.0/jszip.min.js")}}"></script>
  <script src="{{asset("api/DataTables/pdfmake-0.1.36/pdfmake.min.js")}}"></script>
  <script src="{{asset("api/DataTables/pdfmake-0.1.36/vfs_fonts.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.html5.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.print.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.colVis.min.js")}}"></script>

  <script>
   $(document).ready(function() {
    var table = $('#userTable').DataTable( {
        responsive: true,
        "searching": true,
         "language": {
            "search": "<i class='fas fa-search'></i>",
             "paginate": {
                "previous": "<i class='fas fa-caret-left'></i>",
                "next": "<i class='fas fa-caret-right'></i>"
              },
                "lengthMenu": "_MENU_",
                "zeroRecords": "Não encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
          },
        //   colReorder: true,
        // "columnDefs": [
        //     {
        //         "targets": [ 1 ], //Índice do vetor representa a 3º coluna
        //         "visible": false,
        //         "searchable": false
        //     },
        //     {
        //         "targets": [ 2 ],
        //         "visible": false,
        //         "searchable": false
        //     },
        //     {
        //         "targets": [ 3 ],
        //         "visible": false,
        //         "searchable": false
        //     }
        // ],
          buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
            },
           'colvis',
          ],
    } );
    // $('#userTable').addClass('form-inline');
    table.buttons().container().appendTo( '#userTable_wrapper .col-md-6:eq(0)' );
    } );

    //TOOLTIPS
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    //RETURN VALUES BUTTON TO MODAL
    $('#modalEditUser').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recName = button.data('nome')
  var recUser = button.data('usuario')
  var recEmail = button.data('email')
  var recStatus = button.data('situacao')
  var recId = button.data('id')
  var recProfile = button.data('perfil')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('USUÁRIO(a) ' + recName)
  modal.find('#editName').val(recName)
  modal.find('#editUser').val(recUser)
  modal.find('#editEmail').val(recEmail)
  modal.find('#editStatus').val(recStatus)
  modal.find('#editId').val(recId)
  modal.find('#editProfile').val(recProfile)
})

  </script>
  <!--FIM SCRIPT DATATABLE-->
@endpush
