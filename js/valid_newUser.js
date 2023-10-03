const rut_userfield = document.querySelector("[name=rut_reg]");
const nomb_userfield = document.querySelector("[name=nombr_reg]");
const email_userfield = document.querySelector("[name=email_reg]");
const pass_userfield = document.querySelector("[name=password_reg]");
const user_againfield = document.querySelector("[name=passagain_reg]");


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

user_againfield.addEventListener("blur", function (e) {
    const field = e.target;
    const fieldVal = e.target.value;
    if (fieldVal != pass_userfield) {
        field.classList.add("invalid_field");
        field.nextElementSibling.classList.add("falla_field");
        field.nextElementSibling.innerText = "Debe ingresar la misma Contraseña";
        
    }else{
        field.classList.remove("invalid_field");
        field.nextElementSibling.classList.remove("falla_field");
        field.nextElementSibling.innerText = "";
    }
})


rut_userfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar un Rut", e));
nomb_userfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar un Nombre", e));
email_userfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar un E-mail", e));
pass_userfield.addEventListener("blur", (e) => valid_ClieEmptyness("Debe ingresar una Contraseña", e));
