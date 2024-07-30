function validateForm(formName) {
    let form = document.forms[formName];
    let inputs = form.getElementsByTagName('input');
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "") {
            alert("Todos los campos son obligatorios.");
            return false;
        }
    }
    return true;
}
