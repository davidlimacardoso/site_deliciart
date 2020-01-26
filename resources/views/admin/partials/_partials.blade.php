
@section('admin-header')
<!--HEADER-->
    @include('/admin/partials/_header')

@show


@section('admin-nav')
    <div class="d-flex">

        <!--NAV-->
        @include('/admin/partials/_nav')

        @show

        @section('admin-body')
    <!--CONTEUDO-->
    </div>
@show
