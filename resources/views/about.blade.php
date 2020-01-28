@extends('layouts/main')

<!--Título da página-->
@section('title-page','Sobre a DeliciArt')

@push('styles')
    <link rel="stylesheet" href="{{asset("css/about.css")}}">
@endpush
    
@section('body-content')

    <div class="parallax" style="height: 100px; margin-bottom: -1px"></div>

    {{-- <div class="parallax">
        <div class="text-center">
            <img class="img-fluid" src="{{asset('content_site/imagens/logotipo.png')}}">
        </div>
    </div> --}}

    <div class="parallax" style="height: 50px;">
        <div class="text-center">
            <img class="img-fluid my-n5" src="{{asset('content_site/imagens/logotipo.png')}}" alt="" srcset="">
        </div>
        <div style="height:100px"></div>
    </div>

    <div class="py-4 container">
        <div class="container">
          <h1 class="display-4 mt-5 pt-3 text-center font_aprilea">Damos alegria com uma pitada de doçura!</h1>
          <p class="lead text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus expedita quo quas, officiis debitis ea hic corporis id error vitae eligendi molestias optio mollitia quam neque dolor voluptatibus est. Non.</p>
        </div>
      </div>

    <div class="parallax" style="height:200px"></div>

    <div class="parallax" style="height: 100px;">
        <div class="text-center">
            <img width="400" style="border-radius: 5px 5px 5px 5px;" class="img-fluid team-img" src="{{asset('storage/sobre/equipe-foto.png')}}" alt="" srcset="">
        </div>
    </div>

    <div class="py-4 mb-5 container">
        <div class="container">
          <h1 class="display-4 mt-4 pt-5 text-center font_aprilea">Nossa Equipe</h1>
          <p class="lead text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus expedita quo quas, officiis debitis ea hic corporis id error vitae eligendi molestias optio mollitia quam neque dolor voluptatibus est. Non.</p>
        </div>
      </div>    
      
    @parent
@endsection
