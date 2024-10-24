botaoOpcao1 = document.getElementById('option1');
botaoOpcao2 = document.getElementById('option2');

labelChoice = document.getElementById('cpf'); 
labelFor = document.getElementById('changedLabel')

botaoOpcao1.addEventListener('click', function () {
    if (this.checked) {
        labelChoice.name ="cpf";
        labelChoice.placeholder = "cpf";
        labelFor.innerHTML = "CPF";
        labelChoice.id = "cpf";

        console.log(        labelFor.class);
    }
});

botaoOpcao2.addEventListener('click', function () {
    if (this.checked) {
        labelChoice.name = "cnpj";
        labelChoice.placeholder = "cnpj";
        labelFor.innerHTML = "CNPJ";
        labelChoice.id = "cnpj";
        console.log(labelChoice.id);
    }
});
