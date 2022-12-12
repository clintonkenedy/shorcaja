@extends('layout.app')

@section('css')



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

    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-6">


                            <div id="datalist" >
                                <label for="exampleDataList" class="form-label">Codigo Estudiante</label>
                                <input id="datalist-input" class="form-control" type="number" >
                                <i id="datalist-icon" class="icon iconfont icon-arrow"></i>

                                <ul id="datalist-ul" class="list-group"></ul>
                            </div>
                        </div>

                        <div class="col-md-6">


                            <div id="datalistname" >
                                <label for="exampleDataList" class="form-label">Nombre</label>
                                <input id="datalist-name" class="form-control" type="text">
                                <i id="datalist-icon" class="icon iconfont icon-arrow"></i>

                                <ul id="datalistname-ul" class="list-group"></ul>
                            </div>
                        </div>
                        <h5 id="ticketsentregados"></h5>







                        <div class="col-12">
                            <button hidden id="buscarcodigo"  class="btn btn-primary btn-lg">buscar</button>
                            <button id="resetear"  class="btn btn-primary ">Limpiar X</button>

                        </div>


                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">

                    <div class="row g-3">
                        <div class="col-md-6">

                            <div id="datalistticket" >
                                <label for="exampleDataList" class="form-label">Nro Ticket</label>
                                <input id="datalist-ticket" class="form-control" type="text">
                                <i id="datalist-icon" class="icon iconfont icon-arrow"></i>

                                <ul id="datalistticket-ul" class="list-group"></ul>
                            </div>
                            <div id="alertas">

                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="inputAddress" value="15 soles" disabled>
                        </div>
                        <div class="col-12">
                            <button id="addticket" class="btn btn-primary">+1 ticket</button>
                        </div>

                    </div>


                    <table class="table" id="resumen">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cod Est</th>
                            <th scope="col">Ticket</th>
                            <th scope="col">Estado</th>

                            <th scope="col">Del</th>
                        </tr>
                        </thead>

                    </table>
                    <p>El precio final deberia ser: <span id="preciof"></span></p>
                    <button type="submit" id="btnpagar"class="btn btn-success">Enviar</button>
                </div>
            </div>
        </div>

    </div>



@stop

@section('js')
    <script>
        let EsT = {{ Js::from($estudiantesT) }};
        let Es = {{ Js::from($estudiantes) }};
        let Tk = {{ Js::from($tickets) }};

        function get1(ruta){
            fetch(ruta,{
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                method:'GET',})
                .then(response => response.json())
                .then(function(result){
                    //alert(result);
                    console.log(result);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }


        function post(data,id){

            fetch(id, {
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



    </script>
    <script src="{{asset('js/buscador.js')}}"></script>
    <script src="{{asset('js/buscadornombre.js')}}"></script>
    <script src="{{asset('js/buscadorticket.js')}}"></script>
    <script>
        /*$(function() {
            $('select').multipleSelect({
                filter: true
            })
        })*/

        console.log(Es);
        console.log(EsT);
        //console.log(Tk);
        const estados = ['Entregado','Pagado','Usado'];
        const estadoscolor = ['badge bg-warning me-1','badge bg-success me-1','badge bg-danger me-1'];
        let estudiantecodigo;

        function esdutuanteexis(estudiante,nombre,valor){
            if(estudiante){
                estudiantecodigo=estudiante;
                console.log(estudiante);
                nombre.value=valor;
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
                        case 'Usado':
                            spanticket.className="badge bg-danger me-1";
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




        buscarcodigo.onclick = function (v){
            console.log("fffffffffffffffffffffff");
            document.getElementById("ticketsentregados").innerHTML="";
            console.log("valor->"+v.innerText);
            console.log(v.parentNode.parentNode.childNodes[3].id);
            if(v.parentNode.parentNode.childNodes[3].id=='datalist-input'){
                console.log("es codigo");
                console.log(v);
                //let inputValueB = document.getElementById("datalist-input").value;
                let inputValueB = v.innerText;
                console.log("holaaaaa-->"+inputValueB);
                if(inputValueB===''){
                    console.log("error dato vacio")
                }else{
                    let nombre = document.getElementById("datalist-name");
                    let estudiante = Es.find(j => j.codigo_mat == inputValueB);
                    let valor=estudiante.nombre+" "+ estudiante.apellidop+" "+ estudiante.apellidom;
                    esdutuanteexis(estudiante,nombre,valor);
                }
            }
            else if(v.parentNode.parentNode.childNodes[3].id=='datalist-name'){
                console.log("es dni");
                //console.log(inputn.value.length);
                //let inputValueB = document.getElementById("datalist-name").value;
                let inputValueB = v.innerText;
                let inputValueid = document.getElementById("datalist-name").id;
                console.log("---------->");
                console.log(v);
                console.log("nameee->"+v.id);
                if(inputValueB===''){
                    console.log("error dato vacio")
                }else{
                    let codigo = document.getElementById("datalist-input");
                    let estudiante = Es.find(j => j.dni == v.id);
                    let valor=estudiante.codigo_mat;
                    esdutuanteexis(estudiante,codigo,valor);
                }
            }




            //document.getElementById("inputCodEst").value='';
        };

        resetear.onclick=function (){
            //location.reload();
            console.log("resetaer")
            document.getElementById('datalist-name').value= "";
            document.getElementById('datalist-input').value = "";
            document.getElementById('datalist-name').disabled = false;
            document.getElementById('datalist-input').disabled = false;
            const myNode = document.getElementById("ticketsentregados");

            while (myNode.lastElementChild) {
                myNode.removeChild(myNode.lastElementChild);
            }

        };


    </script>
    <script>
        let pre=0;
        let agregados = [];
        let ticketss = [];
        let fragment = document.createDocumentFragment();
        let addticket = document.querySelector("#addticket");
        let tbody = document.createElement('tbody');
        fragment.appendChild(tbody);
        document.getElementById('resumen').appendChild(fragment);
        let i=0;

        addticket.addEventListener('click', function handleClick(event) {
            /*let inputValue = document.getElementById("inputNticket").value;*/
            let inputValue = document.getElementById("datalist-ticket").value;



            console.log('element clicked 🎉🎉🎉');
            if(inputValue===''){
                console.log("error dato vacio");
            }else{
                let ticket = EsT.find(j => j.codigo == inputValue);
                if(ticket.estado=='Libre'){
                    agregados.push(inputValue);
                    console.log("agregadoooooooooooooooooos");
                    console.log(agregados);
                    console.log();
                    let ticketobj = {
                        id: ticket.id,
                        codigo: inputValue,
                        estado: '',
                        estudiante_id: input.value,
                        estudianteco: null,
                    };
                    if (estudiantecodigo!==undefined){
                        ticketobj.estudianteco=estudiantecodigo;
                    }



                    if(agregados.length === new Set(agregados).size){
                        let tr = document.createElement('tr');
                        tr.id="tick"+i;
                        let th1 = document.createElement('th');
                        th1.textContent=i++;
                        let td2 = document.createElement('td');
                        td2.textContent=input.value;
                        let td3 = document.createElement('td');
                        td3.textContent=inputValue;
                        let td4 = document.createElement('td');
                        td4.textContent="⛔";
                        let td5 = document.createElement('td');
                        let spanstado = document.createElement('span');
                        spanstado.className=estadoscolor[0];
                        spanstado.textContent=estados[0];
                        ticketobj.estado=estados[0];
                        td5.appendChild(spanstado);
                        let estadoi=0;
                        td5.onclick = function (){
                            console.log(estadoi);
                            if(estadoi>1){
                                estadoi=0;
                                spanstado.setAttribute("class",estadoscolor[estadoi]);
                                spanstado.innerHTML=estados[estadoi];
                                ticketobj.estado=estados[estadoi];
                                console.log(estados[estadoi]);
                            }else{
                                estadoi++;
                                spanstado.setAttribute("class",estadoscolor[estadoi]);
                                spanstado.innerHTML=estados[estadoi];
                                ticketobj.estado=estados[estadoi];
                                console.log(estados[estadoi]);
                            }

                        }
                        td4.addEventListener("click", e => {
                            //tr.remove();
                            console.log("eliminarrr");
                            console.log(tr.childNodes[2].textContent);
                            let buscareliminar = tr.childNodes[2].textContent;
                            let index = ticketss.map(t => t.codigo).indexOf(buscareliminar)
                            ticketss.splice(index, 1);
                            agregados.splice(index, 1);
                            tr.remove();

                            /*agregados.splice(tr.firstChild.textContent,1);
                            ticketss.splice(tr.firstChild.textContent,1);*/
                            //console.log(tbody.childNodes);
                            console.log("dato borrado");
                            pre=pre-15;
                            const preciof1 = document.getElementById("preciof");
                            preciof1.textContent=pre;
                            //console.log("Se ha clickeado el id "+id);
                        });

                        /*td4.onclick = function (e) {
                            tr.remove();
                            agregados.pop();
                            ticketss.pop();
                            console.log("dato borrado");
                            pre=pre-12;
                            const preciof1 = document.getElementById("preciof");
                            preciof1.textContent=pre;
                        };*/

                        tr.appendChild(th1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td5);
                        tr.appendChild(td4);

                        tbody.appendChild(tr);
                        let div = document.createElement('p');
                        div.textContent = "hola1";
                        fragment.appendChild(tbody);
                        document.getElementById('resumen').appendChild(fragment);
                        document.getElementById("datalist-ticket").value="";
                        const preciof1 = document.getElementById("preciof");
                        pre=pre+15;
                        preciof1.textContent=pre;
                        ticketss.push(ticketobj);

                    }else{
                        agregados.pop();
                        console.log("error dato duplicado");
                        document.getElementById("datalist-ticket").value="";
                    }


                }
                else{
                    console.log("codigo rpetido");
                    alert("codigo repetido");
                    let div = document.createElement('div');
                    div.id="coderepe";
                    div.className="alert alert-warning";
                    div.textContent="codigo repetido";
                    document.getElementById("alertas").appendChild(div);
                    setTimeout(() => {
                        document.getElementById("coderepe").remove();
                    }, 1000);

                }

                //duplicados

                /*function containsDuplicates(array) {
                    return array.length !== new Set(array).size;
                }*/


            }


        });


           btnpagar.onclick=function (){
               console.log("pagar");
               console.log(!ticketss.length);
               if(ticketss.length){
                   post(ticketss,1);
                   const toastTrigger = document.getElementById('liveToastBtn')
                   const toastLiveExample = document.getElementById('liveToast')
                   const toast = new bootstrap.Toast(toastLiveExample)

                   toast.show()
                   setTimeout(() => {
                       location.reload()
                   }, 1500);



                   //location.reload();
               }else {

                   const toastLiveExample = document.getElementById('liveToast1')
                   const toast = new bootstrap.Toast(toastLiveExample)

                   toast.show()
                   console.log("no hay nada para enviar");
                   setTimeout(() => {
                       location.reload()
                   }, 1500);
                   //



               }




           }




    </script>
@endsection

