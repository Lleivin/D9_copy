// SCRIP PARA MENU DESPLEGABLE
function toggleSubMenu() {
  var submenu = document.getElementById("submenu");
  submenu.classList.toggle("show");
}

// Función para mostrar u ocultar el nuevo submenú al hacer hover sobre el submenú principal
function toggleSubSubMenu() {
  var subSubMenu = document.getElementById("subsubmenu");
  subSubMenu.classList.toggle("show");
}

// SCRIPT PARA ERROR DE NEWSLETTER
var errorNewsletter = document.getElementById("errorNewsletter");
function mostrarErrorNewsletter() {
  sourceIndex.removeAttribute("src");
  sourceElement.setAttribute("src", "../Nuevo_D9/videos/enclave.mp4");
}

// SCRIPT PARA VIDOE INDEX

var sourceIndex = document.getElementById("sourceIndex");
var ladoIzquierdoIndex = document.getElementById("ladoIzquierdoIndex");
var ladoDerechoIndex = document.getElementById("ladoDerechoIndex");

function reproducirVideoEnclave() {
  sourceIndex.removeAttribute("src");
  sourceElement.setAttribute("src", "../Nuevo_D9/videos/enclave.mp4");
}
function reproducirVideoDistrito() {
  sourceIndex.removeAttribute("src");
  sourceElement.setAttribute("src", "../Nuevo_D9/videos/distrito9.mp4");
}

// SCRIP MENSAJE DE ERROR Genérico
// var mensajeDeError = "Debes escribir un correo electrónico";
function mostrarMensajeError(mensaje) {
  var cajaMensajeErrorNewsletter = document.getElementById(
    "cajaMensajeErrorNewsletter"
  ); //seleccionar elemento
  let mensajeErrorNewsletter = document.createElement("p"); //crear el elemento
  mensajeErrorNewsletter.classList.add("incorrecto"); //añadir estilo incorrecto
  mensajeErrorNewsletter.innerText = mensaje; //aplicarle texto
  cajaMensajeErrorNewsletter.appendChild(mensajeErrorNewsletter); //imprimirlo como hijo
  setTimeout(() => {
    cajaMensajeErrorNewsletter.remove();
  }, 5000);
}
function mostrarMensajeCorrecto(mensaje) {
  var cajaMensajeErrorNewsletter = document.getElementById(
    "cajaMensajeErrorNewsletter"
  ); //seleccionar elemento
  let mensajeCorrectoNewsletter = document.createElement("p"); //crear el elemento
  mensajeCorrectoNewsletter.classList.add("correcto"); //añadir estilo incorrecto
  mensajeCorrectoNewsletter.innerText = mensaje; //aplicarle texto
  cajaMensajeErrorNewsletter.appendChild(mensajeCorrectoNewsletter); //imprimirlo como hijo
  setTimeout(() => {
    mensajeCorrectoNewsletter.remove();
  }, 5000);
}
