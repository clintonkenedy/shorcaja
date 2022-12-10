const containern = document.getElementById("datalistname");
const inputn = document.getElementById("datalist-name");
const listn = document.getElementById("datalistname-ul");

containern.addEventListener("click", e => {
    console.log(e.target.id);
    if (e.target.id === "datalist-name") {

        containern.classList.toggle("active");
    } else if (e.target.id === "datalist-icon") {
        containern.classList.toggle("active");
        inputn.focus();
        console.log("fa");
    }
    let seleccionadosname = [];
    inputn.addEventListener("input",function (e){
        console.log("holaa");
        if (!containern.classList.contains("active")) {
            containern.classList.add("active");
        }
        seleccionadosname.length = 0;
        let fragmentn = document.createDocumentFragment();
        let elValorn = inputn.value;
        if (elValorn.length > 0) {
            document.getElementById('datalist-input').disabled = true;
            Es.forEach(j => {
                if(isNaN(elValorn)){
                    let er=new RegExp(elValorn,"i");

                    if(er.test(j.nombre)){
                        if(seleccionadosname.length <10){
                            seleccionadosname.push(j);
                        }
                    }

                }
                else {
                    if (j.dni.includes(elValorn)) {
                        // si lo incluye agregalo al array de los seleccionados
                        if(seleccionadosname.length <10){
                            seleccionadosname.push(j);
                        }
                    }
                }
            });
            console.log("--------------");
            console.log(seleccionadosname);
            //para cada elemento selccionado
            if(seleccionadosname.length!=0){

                listn.classList.add("active");
                listn.innerHTML = seleccionadosname
                    .map(o => `<li class="list-group list-group-flush  ps-3 pt-2 pb-2" id=${o.dni}>${o.nombre} ${o.apellidop} ${o.apellidom}</li>`)
                    /*.map(o => `<li class="list-group list-group-flush  ps-3 pt-2 pb-2" id=${o.dni}>${o.nombre}</li>`)*/
                    .join("");

            }else{

                listn.innerHTML =`<lu class="list-group list-group-flush  ps-3 pt-2 pb-2"  >Nigun Resultado</lu>`;
            }
        }
        else {
            document.getElementById('datalist-input').disabled = false;
            document.getElementById('datalist-input').value = "";
            //vacía el resultado
            listn.innerHTML = "";
            //agrega el fragmento al resultado
            listn.appendChild(fragment);

        }
    });
    listn.addEventListener("click", function(e) {
        if (e.target.nodeName.toLocaleLowerCase() === "li") {
            inputn.value = e.target.innerText;
            inputn.name=e.target.id;
            console.log("clikckk");
            console.log(e);
            containern.classList.remove("active");
        }
    });
});
