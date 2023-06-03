document.addEventListener('DOMContentLoaded', () => {
    const divContainerLogin = document.querySelector(".col-12 > .container.superpuesto")
    const btnLogin = document.querySelector("#btnLogin")
    const btnCloseLogin = document.querySelector("#divlogin a.exit-card");

    if (divContainerLogin != null && btnLogin != null && btnCloseLogin != null) {
        /*-- Realiza modificaciones para que no se usen las rutas de Eugenio para mostrar la ventana de inicio de sesión --*/
        btnLogin.removeAttribute("href");
        btnCloseLogin.removeAttribute("href");

        /*-- Controla eventos --*/
        btnLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.remove("d-none");
        });
        btnCloseLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.add("d-none")
        });
    }
});