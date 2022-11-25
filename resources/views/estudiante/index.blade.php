@extends('layout.app')
@section('content')

<h1>hola</h1>
<div class="container">
    <div class="card">

        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

{{--<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <h5 class="text-white h4">Collapsed content</h5>
        <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
</div>
<div class="container" id="buscar">
    <form class="d-flex" role="search">
--}}{{--        <input class="form-control me-2" id="buscador" type="search" placeholder="Search" aria-label="Search">--}}{{--
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <select class="form-select selectv" id="selectv1" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>--}}
{{--
<div id="buscar">
    <form>
        <input type="text" id="buscador" name="name" placeholder="busca" autocomplete="off" />
    </form>
</div>--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buscador de Ticket Polladas</div>
                <div class="card-body">
                    <div class="row justify-content-center text-center">
                        <label for="nroticket" class="col-md">Ingrese ticket de pollada</label>
                        <div class="col-md">
{{--                            <input id="buscador" type="text" class="form-control @error('nroticket') is-invalid @enderror" name="nroticket" value="{{ old('nroticket') }}" required autocomplete="nroticket" autofocus>--}}
                            <input class="form-control" id="buscador" type="text" placeholder="Search" aria-label="Search">

                            @error('nroticket')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-8" id="resultado">

        </div>
    </div>
</div>


@stop

@section('js')
    <script>


        // Make a request for a user with a given ID
        axios.get('/user?ID=12345')
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });

        let json = {{ Js::from($estudiantes) }};
        console.log(json);
        // el erray de los nombres seleccionados
        let seleccionados = [];
        // cada vez que el valor del elemento input cambia
        buscador.addEventListener("input", () => {
            //vacia el array de los nombres seleccionados
            seleccionados.length = 0;
            //para más eficiencia crea un nuevo fragmento
            let fragment = document.createDocumentFragment();
            //recuoera el valor del input y guardalo en una variable
            let elValor = buscador.value;
            //si hay un valor
            if (elValor.length > 0) {
                // busca en el json si el nombre incluye (o empieza por) el valor
                json.forEach(j => {
                    //if(j.nombre.startsWith(elValor))
                    if(isNaN(elValor)){
                        if (j.nombre.includes(elValor)) {
                            // si lo incluye agregalo al array de los seleccionados
                            if(seleccionados.length <10){
                                seleccionados.push(j.nombre);
                            }
                        }
                    }
                    else {
                        if (j.codigo_mat.includes(elValor)) {
                            // si lo incluye agregalo al array de los seleccionados
                            if(seleccionados.length <10){
                                seleccionados.push(j);
                            }
                        }
                    }


                });

                /*for(let a ;a<10;a++){
                    if(json[a].codigo_mat.includes(elValor)){

                    }
                }*/

                //para cada elemento selccionado
                if(seleccionados.length!=0){
                    seleccionados.forEach(s => {
                        //cuyo innerHTML es el nombre seleccionado
                        //p.innerHTML = s.nombre;

                        //p.textContent = s.nombre;
                        let bpagar = document.createElement("a")
                        bpagar.href="#";
                        bpagar.className="btn btn-primary";
                        bpagar.textContent="Pagado";

                        let nombre = document.createElement("p");
                        nombre.className="card-text";
                        nombre.textContent=s.nombre;

                        let cardb = document.createElement("div");
                        cardb.className="card-body";
                        cardb.appendChild(nombre);
                        cardb.appendChild(bpagar);

                        let cardh = document.createElement("div"); // <div></div>
                        cardh.className="card-header";// <div id="app"></div>
                        cardh.textContent ="Informacion del Ticket"
                        //cardh.appendChild(cardb); // <div id="app"><div>Esto es un div insertado con JS</div></div>

                        let card = document.createElement("div");
                        card.className="card mt-3 text-white bg-success";
                        card.appendChild(cardh);
                        card.appendChild(cardb);

                        //y agregalo al fragmento
                        fragment.appendChild(card);
                    });
                }else{
                    let p = document.createElement("p");
                    p.textContent="no rsultados";
                    fragment.appendChild(p);
                }

                //vacía el resultado
                resultado.innerHTML = "";
                //agrega el fragmento al resultado
                resultado.appendChild(fragment);
            }
            else {
                //vacía el resultado
                resultado.innerHTML = "";
                //agrega el fragmento al resultado
                resultado.appendChild(fragment);

            }
        });
























        /*const selectElement = document.querySelector('#selectv1');

        selectElement.addEventListener('change', (event) => {
            alert('hola');
        });*/

    </script>

@endsection

