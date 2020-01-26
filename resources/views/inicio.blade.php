@extends('layouts/main')

<!--Título da página-->
@section('title-page','Doces, Bolos e Salgados')

@section('body-content')


<!--HEADER-->
    <header>
        <div class="p-5 banner shadow-lg">
            <h1 class="display-2 sombra_texto">Bolos, doces e salgados...</h1>
            <p class="h2 sombra_texto">A arte de fazer delícias para suas festas e eventos.</p>
            <a class="btn btn-brown btn-lg mt-3" href="#" role="button">Leia mais</a>
        </div>
    </header>

<!--ARTIGO-->
    <article>
        <div class="bg-transparent text-center p-5">
            <h3 class="display-5">Atendemos seus pedidos, sob encomenda...</h3>
            <p class="h4">A DeliciArt tem o prazer de entrega produtos de qualidade, feitos com muito amor e dedicação para Barueri e Região.</p>
        </div>
    </article>

<!--CARDS-->
<div class="font_aprilea sombra_texto_card  text-white">

	<div class="card-group m-auto col-10 col-sm-8 col-md-7 col-lg-12 pb-5">
		<div class=" col-12 col-md-12 col-lg-4 mt-3">
			<div class="card shadow">
				<img class="card-img-top img-effect" src="{{asset('content_site/imagens/cards/bolo.jpg')}}" alt="Card image">
				<div class="card-img-overlay">
					<h3 class="card-title">Bolos</h3>
					<h5 class="card-text">Olhe nossas obras deliciosas confeccionadas para os nossos clientes.</h5>
					<a class="btn btn-brown btn-md " href="bolos"role="button">Veja mais</a>
				</div>
			</div>
		</div>

		<div class=" col-12  col-md-12 col-lg-4 mt-3">
			<div class="card shadow">
				<img class="card-img-top" src="{{asset('content_site/imagens/cards/doces.jpeg')}}" alt="Card image">
				<div class="card-img-overlay">
					<h3 class="card-title">Doces</h3>
					<h5 class="card-text">Adoce ainda mais sua vida com nossos maravilhosos doces.</h5>
					<a class="btn btn-brown btn-md" href="doces" role="button">Veja mais</a>
				</div>
			</div>
		</div>

		<div class=" col-12  col-md-12 col-lg-4 mt-3">
			<div class="card shadow">
				<img class="card-img-top" src="{{asset('content_site/imagens/cards/salgados.jpg')}}" alt="Card image">
				<div class="card-img-overlay">
					<h3 class="card-title">Salgados</h3>
					<h5 class="card-text">O amor está nas pequenas coisas. Em nossos salgadinhos.</h5>
					<a class="btn btn-brown btn-md" href="salgados" role="button">Veja mais</a>
				</div>
			</div>
		</div>
	</div>
</div>


    @parent
@endsection




    
