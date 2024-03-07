function fazerLogin() {
  const email = document.getElementById("email").value;
  const senha = document.getElementById("senha").value;
  const log = document.getElementById("log");
  const divLoading = document.getElementById("cu");
  if (email === "" && senha === "") {
    log.style.display = "block";
    log.innerHTML = "Por favor, preencha os campos acima";
    log.classList.remove("alert-light");
    log.classList.add("alert-warning");
    return;
  } else if (email === "") {
    log.style.display = "block";
    log.innerHTML = "Por favor, preencha o campo de e-mail.";
    log.classList.remove("alert-light");
    log.classList.add("alert-warning");
    return;
  } else if (senha === "") {
    log.style.display = "block";
    log.innerHTML = "Preencha o campo de senha";
    log.classList.remove("alert-light");
    log.classList.add("alert-warning");
    return;
  } else if (senha.length < 6) {
    log.style.display = "block";
    log.innerHTML = "A senha deve conter no mínimo 6 dígitos";
    log.classList.remove("alert-light");
    log.classList.add("alert-warning");
    return;
  } else {
    log.style.display = "none";
  }
  mostrarProcessando();
  fetch("./config/logintest.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "email=" +
      encodeURIComponent(email) +
      "&senha=" +
      encodeURIComponent(senha)
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log(data);
        setTimeout(function () {
          window.location.href = "../index.php";
        }, 1000);
        log.style.display = "block";
        log.classList.remove("alert-danger");
        log.classList.remove("alert-light");
        log.classList.add("alert-success");
        log.innerHTML = data.message;
      } else {
        console.log(data);
        log.style.display = "block";
        log.classList.remove("alert-light");
        log.classList.add("alert-danger");
        log.innerHTML = data.message;
      }
      esconderProcessando();
    })
}
function mostrarProcessando() {
  var divProcessando = document.createElement("div");
  divProcessando.id = "processandoDiv";
  divProcessando.style.position = "fixed";
  divProcessando.style.top = "85%";
  divProcessando.style.left = "16.5%";
  divProcessando.style.transform = "translate(-50%, -50%)";
  divProcessando.innerHTML =
    '<img src="../img/loading.gif" width="200px" alt="Processando..." title="Processando...">';
  cu.appendChild(divProcessando);
}
function esconderProcessando() {
  const divProcessando = document.getElementById("processandoDiv");
  if (divProcessando) {
    cu.removeChild(divProcessando);
  }
}

function duvifale() {
  alert("Envio Concluido!!!");
}
