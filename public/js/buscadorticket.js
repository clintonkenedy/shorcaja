



const containert = document.getElementById("datalistticket");
const inputt = document.getElementById("datalist-ticket");
const listt = document.getElementById("datalistticket-ul");

containert.addEventListener("click", e => {
    console.log(e.target.id);
    if (e.target.id === "datalist-ticket") {
        console.log("datalit");
        containert.classList.toggle("active");
    } else if (e.target.id === "datalist-icon") {
        containert.classList.toggle("active");
        inputt.focus();
        console.log("fa");
    }
    let seleccionados = [];
    inputt.addEventListener("input",function (e){

        if (!containert.classList.contains("active")) {
            containert.classList.add("active");
        }
        console.log(e);
        seleccionados.length = 0;
        let fragment = document.createDocumentFragment();
        let elValor = inputt.value;
        if (elValor.length > 0) {
            //document.getElementById('datalist-ticket').disabled = true;
            EsT.forEach(j => {
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
                    let er=new RegExp(elValor,"i");

                    if(er.test(j.codigo)){
                        seleccionados.push(j);
                        /*if(seleccionados.length <10){

                        }*/
                    }
                    /*if (j.codigo.includes(elValor)) {
                        // si lo incluye agregalo al array de los seleccionados
                        if(seleccionados.length <10){

                        }
                        seleccionados.push(j);
                    }*/
                }
            });
            console.log("--------------");
            console.log(seleccionados);
            seleccionados.sort((a,b)=>a.codigo-b.codigo);  // [ 1, 5, 40, 200 ]

            //para cada elemento selccionado
            if(seleccionados.length!=0){

                listt.classList.add("active");
                listt.innerHTML = seleccionados
                    .map(o => `<li class="list-group list-group-flush  ps-3 pt-2 pb-2" id=${o.codigo}>${o.codigo}</li>`)
                    .join("");

            }else{

                listt.innerHTML =`<lu class="list-group list-group-flush  ps-3 pt-2 pb-2"  >Nigun Resultado</lu>`;
            }
        }
        else {
            document.getElementById('datalist-ticket').disabled = false;
            document.getElementById('datalist-ticket').value= "";
            //vacía el resultado
            listt.innerHTML = "";
            //agrega el fragmento al resultado
            listt.appendChild(fragment);

        }
    });
    listt.addEventListener("click", function(e) {
        if (e.target.nodeName.toLocaleLowerCase() === "li") {
            inputt.value = e.target.innerText;
            containert.classList.remove("active");
        }
    });
});
