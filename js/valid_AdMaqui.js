const numser_maquifield = document.querySelector("[name=numser_Maqui]");
const nomb_maquifield = document.querySelector("[name=nombr_Maqui]");
const empr_maquifield = document.querySelector("[name=rutEmpr_Maqui]");

const numser_maquiedifield = document.querySelector("[name=numser_Maquiedi]");
const nomb_maquiedifield = document.querySelector("[name=nombr_Maquiedi]");
const empr_maquiedifield = document.querySelector("[name=rutEmpr_Maquiedi]");


const valid_MaquiEmptyness = (mensage, e) =>{
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

numser_maquifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Numero de Serie", e));
nomb_maquifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Nombre para la Maquina", e));
empr_maquifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Rut de Empresa del Cliente a la Maquina", e));

numser_maquiedifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Numero de Serie", e));
nomb_maquiedifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Nombre para la Maquina", e));
empr_maquiedifield.addEventListener("blur", (e) => valid_MaquiEmptyness("Debe ingresar un Rut de Empresa del Cliente a la Maquina", e));

