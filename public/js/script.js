document.addEventListener('DOMContentLoaded', function () {
    const zipcode = document.querySelector('#zipcode');
    const state = document.querySelector('#state');
    const city = document.querySelector('#city');
    const neighborhood = document.querySelector('#neighborhood');
    const street = document.querySelector('#street');

    zipcode.addEventListener('focusout', async () => {

        try {
            const onlyNumbers = /^[0-9]+$/;
            const zipcodeValid = /^[0-9]{8}$/;

            if (!onlyNumbers.test(zipcode.value) || !zipcodeValid.test(zipcode.value)) {
                throw { zipcode_error: 'Zipcode invalid' };
            }

            const response = await fetch(`https://viacep.com.br/ws/${zipcode.value}/json/`)

            if (!response.ok) {
                throw await response.json();
            }

            const responseZipcode = await response.json();

            state.value = await responseZipcode.uf;
            city.value = await responseZipcode.localidade;
            neighborhood.value = await responseZipcode.bairro;
            street.value = await responseZipcode.logradouro;

        } catch (error) {
            if (error?.zipcode_error) {
                alert('Cep inválido')
            }
            console.log(error);
        }

    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Adiciona um ouvinte de evento ao botão de exclusão
    document.getElementById('destroyBtn').addEventListener('click', function (event) {
        // Exibe uma caixa de diálogo de confirmação
        var confirmacao = confirm("Tem certeza que deseja excluir este contato?");

        // Se o usuário clicar em "Cancelar", impede o envio padrão do formulário
        if (!confirmacao) {
            event.preventDefault();
        }
    });
});