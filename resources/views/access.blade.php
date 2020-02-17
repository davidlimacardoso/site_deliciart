@extends('layouts/main')

<!--Título da página-->
@section('title-page','Acesso ao usuário.')

@push('styles')
    <link rel="stylesheet" href="{{asset("css/user_access.css")}}">
@endpush

@section('body-content')

    <div class="container mt-5">
			<h1 class="text-center pb-3 font_aprilea">Entre e desfrute...</h1>
		<form action="validacao/validarAcesso.php" method="post">
			<div class="row mt-3">
				<div class="form-group col-11 col-sm-8 col-md-6 col-lg-4 mx-auto iconInput">
					<i class="text-dark fas fa-user h5 font-weight-bold"></i>
					<input type="text" class="placeholder form-control font-weight-bold shadow" name="name" placeholder="USUÁRIO" id="email">
					<div class="invalid-feedback d-none" id="emailErro">Por favor, digite seu email ou nome de usuário!</div>
				</div>
			</div>

			<div class="row">
				<div class="form-grou col-11 col-sm-8 col-md-6 col-lg-4  mx-auto iconInput">
					<i class="text-dark fas fa-lock h5 font-weight-bold "></i>
					<input class="placeholder form-control font-weight-bold shadow" type="password" name="password" placeholder="SENHA" id="senha">
					<div class="invalid-feedback d-none" id="senhaErro">Por favor, digite uma senha válida!</div>
				</div>
			</div>

			<div class="row m-5">
				<div class="form-group text-center col-lg-6 col-md-4 mx-auto">
					<button class="btn btn-warning font-weight-bold shadow" type="submit" name="enviar" value="Login">ENTRAR</button>
				</div>
			</div>

			<div class="row m-5">
				<div class="m-auto">
					<h6 class=""><a class="text-dark" href="cadastro">NÃO POSSUI UMA CONTA?</a></h6>
				</div>
			</div>
		</form>

	</div>

    @parent
@endsection
