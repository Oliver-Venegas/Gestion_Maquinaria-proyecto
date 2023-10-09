const titul_mantenfield = document.querySelector("[name=obtitul_Manten]");
const observ_mantenfield = document.querySelector("[name=obser_Manten]");

const tituledi_mantenfield = document.querySelector("[name=obtitul_Mantenedi]");
const obseredi_mantenfield = document.querySelector("[name=obser_Mantenedi]");


const valid_MantenEmptyness = (mensage, e) =>{
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

titul_mantenfield.addEventListener("blur", (e) => valid_MantenEmptyness("Debe ingresar un Titulo a la Observacion", e));
observ_mantenfield.addEventListener("blur", (e) => valid_MantenEmptyness("Debe ingresar una Observacion", e));

tituledi_mantenfield.addEventListener("blur", (e) => valid_MantenEmptyness("Debe ingresar un Titulo a la Observacion", e));
obseredi_mantenfield.addEventListener("blur", (e) => valid_MantenEmptyness("Debe ingresar una Observacion", e));
