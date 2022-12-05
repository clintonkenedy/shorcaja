@extends('layout.app')
@section('content')
    <a href="" class="btn btn-info mb-3">Regresar</a>
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="exampleDataList" class="form-label">Codigo Estudiante</label>
                            <input class="form-control" list="datalistOptions" id="inputCodEst" placeholder="Type to search..." autocomplete="off">
                            <datalist id="datalistOptions">

                            </datalist>
                        </div>

                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">nombre</label>
                            <input type="text" class="form-control" id="inputNombre" disabled>
                        </div>
                        <h5 id="ticketsentregados"></h5>

                        <label for="exampleDataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" id="inputCodEst" placeholder="Type to search..." autocomplete="off">
                        <datalist id="datalistOptions">
                        </datalist>

                        <select class="js-example-disabled-results">
                            <option value="one">First</option>
                            <option value="two" disabled="disabled">Second (disabled)</option>
                            <option value="three">Third</option>
                        </select>



                        <div class="col-12">
                            <button id="buscarcodigo"  class="btn btn-primary">buscar</button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nro Ticket</label>
                            <input type="number" class="form-control" id="inputNticket" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">precio</label>
                            <input type="text" class="form-control" id="inputAddress" value="12 soles" disabled>
                        </div>
                        <div class="col-12">
                            <button id="addticket" class="btn btn-primary">+1 ticket</button>
                        </div>
                        <p>holaaa</p>
                        <select class="selectpicker form-control" data-style="btn-gray" id="docente" name="docente_id">
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                    </div>
                    <select class="selectpicker">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Barbecue</option>
                    </select>
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>
ss

                    <table class="table" id="resumen">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cod Est</th>
                            <th scope="col">Ticket</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>

                    </table>
                    <p>El precio final es: <span id="preciof"></span></p>
                    <button class="btn btn-success">Pagar</button>
                </div>
            </div>
        </div>

    </div>



@stop

@section('js')

    <script>
        var $disabledResults = $(".js-example-disabled-results");
        $disabledResults.select2();
        // To style only selects with the my-select class
        $('.my-select').selectpicker();
        let EsT = {{ Js::from($estudiantesT) }};
        let Es = {{ Js::from($estudiantes) }};
        console.log(Es);
        console.log(EsT);
        let dataList = document.getElementById('datalistOptions');



        Es.forEach(e=>{
            let option = document.createElement('option');
            // Set the value using the item in the JSON array.
            option.value = e.codigo_mat;
            // Add the <option> element to the <datalist>.
            dataList.appendChild(option);
        });



        buscarcodigo.onclick = function () {
            let inputValueB = document.getElementById("inputCodEst").value;
            if(inputValueB===''){
                console.log("error dato vacio")
            }else{
                let nombre = document.getElementById("inputNombre");
                let estudiante = Es.find(j => j.codigo_mat == inputValueB);
                if(estudiante){
                    console.log(estudiante);
                    nombre.value=estudiante.nombre;
                    let ticketest= EsT.filter(t => t.estudiante_id == estudiante.id);
                    console.log(ticketest);
                    ticketest.forEach(te=>{
                        let spanticket=document.createElement("span");
                        switch (te.estado){
                            case 'Pagado':
                                spanticket.className="badge bg-success me-1";
                                break;
                            case 'Entregado':
                                spanticket.className="badge bg-warning me-1";
                                break;
                            default:
                                spanticket.className="badge bg-secondary me-1";
                        }


                        spanticket.textContent=te.codigo;
                        document.getElementById("ticketsentregados").appendChild(spanticket);
                    });



                }else{
                    console.log("no se ha encontrado coincidencias");
                    nombre.value="no hay"
                }
            }
            //document.getElementById("inputCodEst").value='';
        };


    </script>
    <script>
        let pre=0;
        let agregados = [];
        let fragment = document.createDocumentFragment();
        let addticket = document.querySelector("#addticket");
        let tbody = document.createElement('tbody');
        fragment.appendChild(tbody);
        document.getElementById('resumen').appendChild(fragment);


        addticket.addEventListener('click', function handleClick(event) {
            let inputValue = document.getElementById("inputNticket").value;
            console.log('element clicked 🎉🎉🎉');
            if(inputValue===''){
                console.log("error dato vacio");
            }else{
                let ticket = EsT.find(j => j.codigo == inputValue);
                if(!ticket){
                    agregados.push(inputValue);
                    console.log(agregados);
                    if(agregados.length === new Set(agregados).size){
                        let tr = document.createElement('tr');
                        let th1 = document.createElement('th');
                        let td2 = document.createElement('td');
                        td2.textContent="hola";
                        let td3 = document.createElement('td');
                        td3.textContent=inputValue;
                        let td4 = document.createElement('td');
                        td4.textContent="🆑";

                        td4.onclick = function () {
                            tr.remove();
                            agregados.pop();
                            console.log("dato borrado");
                            pre=pre-12;
                            const preciof1 = document.getElementById("preciof");
                            preciof1.textContent=pre;
                        };

                        tr.appendChild(th1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tbody.appendChild(tr);
                        let div = document.createElement('p');
                        div.textContent = "hola1";
                        fragment.appendChild(tbody);
                        document.getElementById('resumen').appendChild(fragment);
                        document.getElementById("inputNticket").value="";
                        const preciof1 = document.getElementById("preciof");
                        pre=pre+12;
                        preciof1.textContent=pre;
                    }else{
                        agregados.pop();
                        console.log("error dato duplicado");
                        document.getElementById("inputNticket").value="";
                    }
                }
                else{
                    console.log("codigo rpetido");
                }

                //duplicados

                /*function containsDuplicates(array) {
                    return array.length !== new Set(array).size;
                }*/


            }
            // document.getElementById("valueInput").innerHTML = inputValue;

        });


    </script>
@endsection

