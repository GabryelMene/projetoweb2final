window.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formCadastro");
  const nome = document.getElementById("nomeId");
  const email = document.getElementById("emailId");
  const tel = document.getElementById("telId");
  const tipo = document.getElementById("tipoContaId");

  form.addEventListener("submit", function(e) {
    e.preventDefault();

    // Remove erros anteriores
    [nome, email, tel, tipo].forEach(input => {
      const next = input.nextElementSibling;
      if (next && next.classList.contains("error"))
        next.remove();
      input.classList.remove("input-error");
    });

    let valid = true;
    const nomeVal = nome.value.trim();
    const emailVal = email.value.trim();
    const telVal = tel.value.trim();
    const tipoVal = tipo.value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const telRegex = /^\(?\d{2}\)?\s?\d{4,5}\-?\d{4}$/;

    if (!nomeVal) {
      showError(nome, "Por favor, preencha o nome.");
      valid = false;
    }

    if (!emailVal) {
      showError(email, "Por favor, preencha o e‑mail.");
      valid = false;
    } else if (!emailRegex.test(emailVal)) {
      showError(email, "Insira um e‑mail válido.");
      valid = false;
    }

    if (!telVal) {
      showError(tel, "Por favor, preencha o telefone.");
      valid = false;
    } else if (!telRegex.test(telVal)) {
      showError(tel, "Insira um telefone válido (ex: (xx) xxxx‑xxxx).");
      valid = false;
    }

    if (!tipoVal) {
      showError(tipo, "Selecione o tipo de conta.");
      valid = false;
    }

    if (valid) {
      alert("Cadastro válido! Submetendo...");
      form.submit();
    }
  });

  function showError(input, message) {
    input.classList.add("input-error");
    const span = document.createElement("span");
    span.className = "error";
    span.innerText = message;
    input.insertAdjacentElement("afterend", span);
    input.focus();
  }
});
