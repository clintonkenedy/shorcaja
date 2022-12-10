
const container = document.getElementById("datalist");
const input = document.getElementById("datalist-input");
const list = document.getElementById("datalist-ul");

container.addEventListener("click", e => {
    console.log(e.target.id);
    if (e.target.id === "datalist-input") {
        console.log("datalit");
        container.classList.toggle("active");
    } else if (e.target.id === "datalist-icon") {
        container.classList.toggle("active");
        input.focus();
        console.log("fa");
    }
    let seleccionados = [];
    input.addEventListener("input",function (e){

        if (!container.classList.contains("active")) {
            container.classList.add("active");
        }
        console.log(e);
        seleccionados.length = 0;
        let fragment = document.createDocumentFragment();
        let elValor = input.value;
        if (elValor.length > 0) {
            document.getElementById('datalist-name').disabled = true;
            Es.forEach(j => {
                if(isNaN(elValor)){
                    // let er=new RegExp(elValor,"i");
                    //
                    // if(er.test(j.nombre)){
                    //     if(seleccionados.length <10){
                    //         seleccionados.push(j);
                    //     }
                    // }

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
            console.log("--------------");
            console.log(seleccionados);
            //para cada elemento selccionado
            if(seleccionados.length!=0){

                list.classList.add("active");
                list.innerHTML = seleccionados
                    .map(o => `<li class="list-group list-group-flush  ps-3 pt-2 pb-2" id=${o.codigo_mat}>${o.codigo_mat}</li>`)
                    .join("");

            }else{

                list.innerHTML =`<lu class="list-group list-group-flush  ps-3 pt-2 pb-2"  >Nigun Resultado</lu>`;
            }
        }
        else {
            document.getElementById('datalist-name').disabled = false;
            document.getElementById('datalist-name').value= "";
            //vacía el resultado
            list.innerHTML = "";
            //agrega el fragmento al resultado
            list.appendChild(fragment);

        }
    });
    list.addEventListener("click", function(e) {
        if (e.target.nodeName.toLocaleLowerCase() === "li") {
            input.value = e.target.innerText;
            input.name=e.target.id;
            console.log("<<<<<<<<");
            container.classList.remove("active");
        }
    });
});
