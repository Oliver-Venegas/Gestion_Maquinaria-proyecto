const rut_emprfield = document.querySelector("[name=rutempr_Clien]");
const nomb_emprfield = document.querySelector("[name=nombrempr_Clien]");
const datefield = document.querySelector("[name=dateempr_Clien]");


const valid_ClieEmptyness = (mensage, e) =>{
    const field = e.target;
    const fieldVal = e.target.value;
    if (fieldVal.trim().length === 0) {
        field.classList.add("invalid_field");
        field.nextElementSibling.classList.add("falla_field");
        field.nextElementSibling.innerText = mensage;
        
    }else{
        field.classList.remove("invalid_field");
        field.nextElementSibling.classList.remove("falla_field");
        field.nextElementSibling.innerText = "";
    }
}

rut_emprfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar un Rut", e));
nomb_emprfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar un Nombre de Empresa", e));
datefield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar una fecha", e));
