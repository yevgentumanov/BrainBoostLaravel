document.addEventListener('DOMContentLoaded', () => {
    const divContainerLogin = document.querySelector(`div#c-login`);
    const btnLogin = document.querySelector(`#btnLogin`)
    const btnCloseLogin = document.querySelector(`div#c-login .exit-card`);
    console.log(btnLogin);
    console.log(divContainerLogin);
    console.log(btnCloseLogin);

    const divContainerRegistro = document.querySelector(`div#c-registro`)
    const btnRegistro = document.querySelector(`#btnRegistro`)
    const btnCloseRegistro = document.querySelector(`div#c-registro .exit-card`);
    console.log(btnRegistro);
    console.log(divContainerRegistro);
    console.log(btnCloseRegistro);

    if (divContainerLogin != null && btnLogin != null && btnCloseLogin != null) {
        /*-- Realiza modificaciones para que no se usen las rutas de Eugenio para mostrar la ventana de inicio de sesión --*/
        // btnLogin.removeAttribute("href");
        // btnCloseLogin.removeAttribute("href");

        /*-- Controla eventos --*/
        btnLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.remove("d-none");
            divContainerRegistro.classList.add("d-none");
        });
        btnCloseLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.add("d-none");
        });
    }

    if (divContainerRegistro != null && btnRegistro != null && btnCloseRegistro != null) {
        /*-- Realiza modificaciones para que no se usen las rutas de Eugenio para mostrar la ventana de inicio de sesión --*/
        // btnRegistro.removeAttribute("href");
        // btnCloseRegistro.removeAttribute("href");

        /*-- Controla eventos --*/
        btnRegistro.addEventListener("click", (e) => {
            divContainerRegistro.classList.remove("d-none");
            divContainerLogin.classList.add("d-none");
        });
        btnCloseRegistro.addEventListener("click", (e) => {
            divContainerRegistro.classList.add("d-none");
        });
    }
});