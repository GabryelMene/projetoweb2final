window.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formProduto");
  const nome = document.getElementById("nome");
  const imagem = document.getElementById("imagem");  // agora tipo text
  const preco = document.getElementById("preco");
  const descricao = document.getElementById("descricao");
  const categoria = document.getElementById("categoria");

  form.addEventListener("submit", function(event) {
    event.preventDefault();

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

    // Validação do nome
    if (!nomeValue) {
      showError(nome, "Por favor, preencha o nome do produto.");
      valid = false;
    }

    // Validação da imagem (URL)
    if (!imagemValue) {
      showError(imagem, "Por favor, insira a URL da imagem.");
      valid = false;
    } else {
      // optional: checar formato de URL
      const urlRegex = /^(https?:\/\/.+\.(jpg|jpeg|png|gif|webp))$/i;
      if (!urlRegex.test(imagemValue)) {
        showError(imagem, "Por favor, insira uma URL de imagem válida (jpg, png, gif…).");
        valid = false;
      }
    }

    // Validação do preço
    if (!precoValue || isNaN(precoValue) || Number(precoValue) <= 0) {
      showError(preco, "Insira um preço válido (maior que zero).");
      valid = false;
    }

    // Validação da descrição
    if (!descricaoValue) {
      showError(descricao, "Por favor, preencha a descrição do produto.");
      valid = false;
    }

    // Validação da categoria
    if (!categoriaValue) {
      showError(categoria, "Por favor, selecione uma categoria.");
      valid = false;
    }

    if (valid) {
      form.submit();
    }
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
