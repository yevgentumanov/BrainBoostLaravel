const banner = document.createElement("div");
document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector("body");
    const decision = localStorage.getItem("acceptedCookies")
    if (decision == null || Number.parseInt(decision) != 1) {
        /*-- Estilos --*/
        banner.id = "bannerCookies";
        banner.classList.add("d-flex")
        banner.classList.add("flex-row");
        banner.classList.add("justify-content-center");
        banner.classList.add("align-items-center");

        /*-- Componente: texto --*/
        const texto = document.createElement("span");
        texto.textContent = "Al navegar por nuestro sitio web, usted acepta que usemos cookies para brindarle la mejor experiencia en nuestra web.";

        /*-- Componente: botón aceptar cookies --*/
        const btnAceptar = creaBoton("Aceptar", fAceptarCookies);
        const btnVerPoliticaPrivacidad = creaBoton("Política de privacidad");

        /*-- Agrega componentes al banner --*/
        banner.append(texto, creaSeparadorHorizontal("1em"), btnAceptar);

        /*-- Agrega el banner a la página --*/
        body.append(banner);
    }
});

function creaBoton(texto, handler = null) {
    const btnAceptar = document.createElement("button");

    /*-- Estilos --*/
    btnAceptar.classList.add("btn");
    btnAceptar.classList.add("btn-5");
    
    /*-- Configuración botón --*/
    btnAceptar.textContent = texto;
    btnAceptar.addEventListener("click", handler);

    /*-- Devuelve el botón --*/
    return btnAceptar;
}

function creaSeparadorHorizontal(size) {
    const separador = document.createElement("span");
    separador.style.width = size;
    return separador;
}

function fAceptarCookies(evento) {
    banner.remove();
    /*-- Guarda en localStorage que el usuario ha aceptado las cookies --*/
    localStorage.setItem("acceptedCookies", "1");
}