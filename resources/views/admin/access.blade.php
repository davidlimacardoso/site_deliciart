@extends('admin/layouts/main')

@section('title','Administração')

@push('styles')
    <link rel="stylesheet" href="{{asset("css/admin_access.css")}}">
@endpush

@section('admin-header')
@endsection

@section('admin-nav')
@endsection

@section('admin-body')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">ACESSO AO SISTEMA</h5>

                        <form>
                        <div class="row mt-3">
                            <div class="form-group col-12 mx-auto iconInput">
                                <i class="text-dark fas fa-user h5 font-weight-bold"></i>
                                <input type="text" class="placeholder form-control font-weight-bold" name="name" placeholder="USUÁRIO">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-grou col-12 mx-auto iconInput">
                                <i class="text-dark fas fa-lock h5 font-weight-bold "></i>
                                <input class="placeholder form-control font-weight-bold" type="password" name="password" placeholder="SENHA">
                            </div>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">ENTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

    @parent
@endsection
