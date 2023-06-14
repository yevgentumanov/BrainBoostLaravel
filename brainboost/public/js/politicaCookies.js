const banner = document.createElement("div");
document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector("body");
    const decision = localStorage.getItem("acceptedCookies")
    if (decision == null || Number.parseInt(decision) != 1) {
        /*-- Estilos --*/
        banner.id = "bannerCookies";
        banner.classList.add("row");
        banner.classList.add("m-0");
        banner.classList.add("justify-content-center");
        banner.classList.add("align-items-center");

        /*-- Componente: texto --*/
        const texto = document.createElement("div");
        texto.id = "t-banner";
        texto.textContent = "Al navegar por nuestro sitio web, usted acepta que usemos cookies para brindarle la mejor experiencia en nuestra web.";
        texto.classList.add("col-12");
        texto.classList.add("col-md-10");

        /*-- Componente: botón aceptar cookies --*/
        const btnAceptar = creaBoton("Aceptar", fAceptarCookies);
        // const btnVerPoliticaPrivacidad = creaBoton("Política de privacidad");

        /*-- Agrega componentes al banner --*/
        banner.append(texto, btnAceptar);

        /*-- Agrega el banner a la página --*/
        body.append(banner);
    }
});

function creaBoton(texto, handler = null) {
    const btnAceptar = document.createElement("button");
    btnAceptar.id = "b-banner";

    /*-- Estilos --*/
    btnAceptar.classList.add("col-12");
    btnAceptar.classList.add("col-md-2");
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