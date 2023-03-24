// https://viacep.com.br/ws/${CEP}/json/

const inputCep = document.querySelector('#cep');
const btnCep = document.querySelector('#btnCep');
const logradouro = document.querySelector('#logradouro');
const bairro = document.querySelector('#bairro');
const cidade = document.querySelector('#cidade');
const uf = document.querySelector('#uf');

btnCep.addEventListener('click', handleClick);

function handleClick(e){
  e.preventDefault();

  const cep = inputCep.value;
  fetchCep(`https://viacep.com.br/ws/${cep}/json/`);
};

async function fetchCep(url) {
  try {
    const cepResponse = await fetch(url);
    const cepJSON = await cepResponse.json();

    logradouro.value = cepJSON.logradouro;
    bairro.value = cepJSON.bairro;
    cidade.value = cepJSON.localidade;
    uf.value = cepJSON.uf;
    //console.log(cepJSON.logradouro)

  } catch (e) {
    console.log(Error(e));
  }
};
