<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Recepción al Cachimbo Sistémico</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
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
    </style>
  </head>
  <body>

    {{-- <nav class="navbar navbar-expand-lg" style="background-color: #918EF4;">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">Recepción al Cachimbo Sistémico</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Bases</a>
              </li>
            </ul>
          </div>
        </div>
    </nav> --}}

        <!-- Header Section Begin -->

    @if (Auth::check())
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-md-7">
                        <div class="header__top__left">
                            <p>Estas logeado</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-5 text-white">
                        Usuario: {{Auth::user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="card mt-3" style="width: 7x0rem">
                <center class="mt-2">
                    <h5 class="card-title">Administración de Ticket</h5>
                </center>
                @if (isset($ticket))
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Ticket # <b>{{$ticket->id}}</b>
                            @if ($ticket->estado==="Usado")
                            <h5 class="text-white"><span class="badge bg-secondary"> {{$ticket->estado}} </span></h5>
                            @elseif ($ticket->estado==="Pagado")
                            <h5 class="text-white"><span class="badge bg-danger"> {{$ticket->estado}} </span></h5>
                            @elseif ($ticket->estado==="Entregado")
                            <h5 class="text-white"><span class="badge bg-info"> {{$ticket->estado}} </span></h5>
                            @elseif ($ticket->estado==="Libre")
                            <h5 class="text-white"><span class="badge bg-success"> {{$ticket->estado}} </span></h5>
                            @endif
                        </h5>


                        @if($ticket->estudiante_id!=null)
                            <p class="card-text">Propietario <br> <b>{{$ticket->estudiante->nombre." ". $ticket->estudiante->apellidop." ".$ticket->estudiante->apellidom}}</b></p>
                        @else
                            <p class="card-text">Sin Estudiante Asignado</p>
                        @endif
                            <form action="{{url("validar/$ticket->id")}}" method="post">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-success" >Validar</button>
                            </form>


                    </center>
                </div>
                @endif
              </div>
        </div>
    </div>
    @else
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Ven y disfruta con tus amigos.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 text-white">

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/banner1xs.jpeg" class="d-block" alt="banner2" srcset="images/banner1xs.jpeg 950w, images/banner1xs.jpeg 950w, images/banner1xs.jpeg 950w" sizes="(max-width: 340px) 340px, (max-width: 410px) 470px, (max-width: 500px) 500px, (max-width: 900px) 990px, 1920px" style="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    @endif
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Noticias</span>
                    <h2>No Te Pierdas De Nada</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card" style="">
                    <div class="card-header">
                        13 de Diciembre <i class="bi bi-calendar-check"></i>
                    </div>
                    <img class="img-fluid card-img-top" src="img/blog/blog-1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Eleccion de Miss y Mister</h5>
                      <p class="card-text">Puedes ver las bases del concurso aqui.</p>
                      <center>
                          <a href="/files/bases.pdf" class="btn btn-dark" target="_blank">Ver</a>
                          {{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            Ver --}}
                          </button>
                      </center>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card" style="">
                    <div class="card-header">
                        13 de Diciembre <i class="bi bi-calendar-check"></i>
                    </div>
                    <img class="img-fluid card-img-top" src="img/blog/blog-2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Recepcion al Cachimbo Sistemico</h5>
                        <p class="card-text">Puedes ver el cronograma del evento aqui.</p>
                        <center>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ver
                              </button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        13 de Diciembre <i class="bi bi-calendar-check"></i>
                    </div>
                    <img class="card-img-top img-fluid" src="img/ubi_antara.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ubicacion del local de Eventos "Antara"</h5>
                        <p class="card-text">Puedes ver la ubicacion del local aqui.</p>
                        <center>
                            <a href="https://www.google.com/maps?ll=-15.837029,-70.027821&z=16&t=m&hl=en&gl=PE&mapclient=embed&cid=6817501502657561201" class="btn btn-dark">Ver</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between text-white pt-3" style="background-color: #dfe2f3">
            <div class="col-sm-4">
                <h6>Promoción 2022 - II</h6>
            </div>
            <div class="col-sm-4">
                <p>Copyright © Diciembre-2022 All rights reserved</p>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->


  <!-- Modal1 -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title fs-5" id="exampleModalLabel">PROGRAMA</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ol>
                <li>Himno Nacional del Perú.</li>
                <li>Palabras de Bienvenida.</li>
                <li>Remate de Cachimbo Sistémico.</li>
                <li>Presentación de Cachimbos y entregra de recordatorios.</li>
                <li>Elección de Miss y Mister Sistémico 2022-II.</li>
                <li>Palabras de agradecimiento.</li>
                <li>Brindis de Honor.</li>
                <li>Palabras de agradecimiento a cargo del presidente dela Promocion 2022-II.</li>
                <li>Inicio de fiesta de gala: Amenizan Chelaband y Los Jaggers.</li>
            </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal2 -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title fs-5" id="exampleModalLabel">Bases</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="pdf"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.js" integrity="sha512-aqpxRD4NwJUXN742KSiIr4zARkh+WTeaWwx0DYuy+9eARX/glcCFtHSeETrIc6V+1BwYfMwvPz5KWlVtRyXikQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>PDFObject.embed("/files/bases.pdf", "#pdf");</script>
  </body>

</html>
