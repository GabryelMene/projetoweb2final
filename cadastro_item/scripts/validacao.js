window.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formProduto");
  const nome = document.getElementById("nome");
  const imagem = document.getElementById("imagem");
  const preco = document.getElementById("preco");
  const descricao = document.getElementById("descricao");
  const categoria = document.getElementById("categoria");

  form.addEventListener("submit", function(event) {
    // Remove mensagens antigas
    [nome, imagem, preco, descricao, categoria].forEach(input => {
      const next = input.nextElementSibling;
      if (next && next.classList.contains("error")) next.remove();
      input.classList.remove("input-error");
    });

    let valid = true;
    const nomeValue = nome.value.trim();
    const imagemValue = imagem.value.trim();
    const precoValue = preco.value.trim();
    const descricaoValue = descricao.value.trim();
    const categoriaValue = categoria.value;

    if (!nomeValue) {
      showError(nome, "Por favor, preencha o nome do produto.");
      valid = false;
    }
    if (!imagemValue) {
      showError(imagem, "Por favor, insira a URL da imagem.");
      valid = false;
    } else {
      const urlRegex = /^(https?:\/\/.+\.(jpg|jpeg|png|gif|webp))$/i;
      if (!urlRegex.test(imagemValue)) {
        showError(imagem, "Insira uma URL de imagem válida.");
        valid = false;
      }
    }
    if (!precoValue || isNaN(precoValue) || Number(precoValue) <= 0) {
      showError(preco, "Insira um preço válido (maior que zero).");
      valid = false;
    }
    if (!descricaoValue) {
      showError(descricao, "Por favor, preencha a descrição do produto.");
      valid = false;
    }
    if (!categoriaValue) {
      showError(categoria, "Por favor, selecione uma categoria.");
      valid = false;
    }

    if (!valid) {
      event.preventDefault();
      return;
    }
    // Se válido, o envio prossegue normalmente
  });

  function showError(input, message) {
    input.classList.add("input-error");
    const span = document.createElement("span");
    span.className = "error";
    span.style.color = "white";
    span.style.padding = "10px";
    span.style.fontWeight = "600";
    span.style.borderRadius = "10px";
    span.style.backgroundColor = "red";
    span.innerText = message;
    input.insertAdjacentElement("afterend", span);
    input.focus();
  }
});
