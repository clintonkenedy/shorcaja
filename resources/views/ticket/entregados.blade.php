@extends('layout.app')

@section('css')

<style>
    html,
        body {
            height: 100%;
            font-family: "Nunito Sans", sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            color: #111111;
            font-weight: 400;
            font-family: "Nunito Sans", sans-serif;
        }

        h1 {
	        font-size: 70px;
        }

        h2 {
            font-size: 36px;
        }

        h3 {
            font-size: 30px;
        }

        h4 {
            font-size: 24px;
        }

        h5 {
            font-size: 18px;
        }

        h6 {
            font-size: 16px;
        }

        p {
            font-size: 15px;
            font-family: "Nunito Sans", sans-serif;
            color: #3d3d3d;
            font-weight: 400;
            line-height: 25px;
            margin: 0 0 15px 0;
        }

        img {
            max-width: 100%;
        }

        input:focus,
        select:focus,
        button:focus,
        textarea:focus {
            outline: none;
        }

        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
            color: #ffffff;
        }

        ul,
        ol {
            padding: 0;
            margin: 0;
        }

        .header {
            background: #ffffff;
        }

        .header__top {
            background: #111111;
            padding: 10px 0;
        }

        .header__top__left p {
            color: #ffffff;
            margin-bottom: 0;
        }

        .header__top__right {
            text-align: right;
        }
        .header__logo {
            padding: 30px 0;
        }

        .header__logo a {
            display: inline-block;
        }

        .section-title {
            margin-top: 50px;
            margin-bottom: 45px;
            text-align: center;
        }

        .section-title span {
            color: #e53637;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            display: block;
        }

        .section-title h2 {
            color: #111111;
            /* font-weight: 700; */
            line-height: 46px;
        }
        .card-img-top{
            width: auto;
            height: 350px;
        }
        .pdfobject-container { height: 30rem; border: 1rem solid rgba(0,0,0,.1); }
        /* .fitting-image {
            width: 150px;
            height: 150px;
            object-fit: <some value>;
        } */
        .reset-this-root {
            all: initial;
            * {
                all: unset;
            }
        }
</style>

@endsection()

@section('content')

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Enviado con exito!
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast1" class="toast text-bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Datos vacios!
            </div>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-md-5">
                        <div class="header__top__left">
                            <p>Conectado <i class="reset-this-root bi bi-circle-fill" style="color: green"></i>
                                <a href="/tickets/create" class="btn btn-sm btn-light" style="float: right"> Tickets</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-5 text-white mt-1">
                        Usuario: {{Auth::user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-3">
                <div class="card-body">
                    <p class="text-muted">Se muestran tus tickets entregados/pagados: </p>
                    <div class="table-responsive">
                        @if (count($tickets)>0)
                        <table class="table" id="resumen">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cod Est</th>
                                <th scope="col">Ticket</th>
                                <th scope="col">Estado</th>
                            </tr>
                            </thead>
                            <tbody>

                                    @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>{{$ticket->estudiante->codigo_mat}}</td>
                                        <td>{{$ticket->codigo}}</td>
                                        @if ($ticket->estado=="Entregado")
                                        <td class="badge bg-warning">{{$ticket->estado}}</td>
                                        @endif
                                        @if ($ticket->estado=="Pagado")
                                        <td class="badge bg-success">{{$ticket->estado}}</td>
                                        @endif
                                        @if ($ticket->estado=="Usado")
                                        <td class="badge bg-danger">{{$ticket->estado}}</td>
                                        @endif

                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                        @else
                        <p> <b>No tienes tickets agregados 😭</b></p>
                      @endif
                    </div>
                </div>
            </div>
        </div>

    </div>



@stop

@section('js')

@endsection

