@extends('layout.app')
@section('content')


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
        function put(id){
            let data={
                'name': 'CLINTON',
                'surname': 'KENEDY'
            }
            fetch('tickets/'+id, {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                method:'PUT',
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(function(result){
                    //alert(result);
                    console.log(result);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }




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
                    // location.reload();
                    //if(j.nombre.startsWith(elValor))
                    if(isNaN(elValor)){
                        if (j.estudiante.nombre.includes(elValor)) {
                            // si lo incluye agregalo al array de los seleccionados
                            if(seleccionados.length <10){
                                seleccionados.push(j);
                            }
                        }
                    }
                    else {
                        if (j.estudiante.codigo_mat.includes(elValor)) {
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
                    let addticket = document.createElement("a");
                    addticket.className="btn btn-success";
                    addticket.addEventListener('click', function handleClick(event) {
                        // put(s.id);
                        // let estado = document.querySelector("#pagar"+s.id);
                        // estado.textContent="Pagado";
                        // s.estado="Pagado";
                        let some= seleccionados.every(t=>t.estudiante_id==seleccionados[0].estudiante_id);

                        console.log(some);
                        let p1 = document.createElement("p");
                        p1.textContent="ADDDDDDDDDDDDDDD";
                        fragment.appendChild(p1);

                        console.log(some);

                    });
                    addticket.textContent="ADD";

                    seleccionados.forEach(s => {
                        //cuyo innerHTML es el nombre seleccionado
                        //p.innerHTML = s.nombre;

                        //p.textContent = s.nombre;


                        let bpagar = document.createElement("a");
                        //bpagar.href="#";
                        bpagar.className="btn btn-primary";
                        bpagar.addEventListener('click', function handleClick(event) {
                            put(s.id);
                            let estado = document.querySelector("#pagar"+s.id);
                            estado.textContent="Pagado";
                            s.estado="Pagado";
                            console.log(s.id+'element clicked 🎉🎉🎉'+s.estado, event);
                        });
                        bpagar.textContent="Pagar";

                        let estado = document.createElement("span");
                        estado.className="badge text-bg-info";
                        estado.id="pagar"+s.id;
                        estado.textContent=s.estado;

                        let nombre = document.createElement("p");
                        nombre.className="card-text";
                        nombre.textContent=s.estudiante.nombre;

                        let cticket = document.createElement("p");
                        cticket.className="card-text";
                        cticket.textContent=s.codigo;

                        let cardb = document.createElement("div");
                        cardb.className="card-body";
                        cardb.appendChild(nombre);
                        cardb.appendChild(cticket);
                        cardb.appendChild(estado);
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
                    fragment.appendChild(addticket);
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

