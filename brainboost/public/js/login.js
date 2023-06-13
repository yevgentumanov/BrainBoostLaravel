document.addEventListener('DOMContentLoaded', () => {
    const divContainerLogin = document.querySelector(`div#c-login`);
    const btnLogin = document.querySelector(`#btnLogin`)
    const btnCloseLogin = document.querySelector(`div#c-login .exit-card`);
    // console.log(btnLogin);
    // console.log(divContainerLogin);
    // console.log(btnCloseLogin);

    const divContainerRegistro = document.querySelector(`div#c-registro`)
    const btnRegistro = document.querySelector(`#btnRegistro`)
    const btnCloseRegistro = document.querySelector(`div#c-registro .exit-card`);
    // console.log(btnRegistro);
    // console.log(divContainerRegistro);
    // console.log(btnCloseRegistro);

    /*-- Si existe formulario de login en la página... --*/
    if (divContainerLogin != null && btnLogin != null && btnCloseLogin != null) {
        /*-- Controla eventos --*/
        btnLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.remove("d-none");
            divContainerRegistro.classList.add("d-none");
        });
        btnCloseLogin.addEventListener("click", (e) => {
            divContainerLogin.classList.add("d-none");
        });
        // divContainerLogin.addEventListener("blur", (e) => {
        //     divContainerLogin.classList.add("d-none");
        // });

        /*-- Si existe una alerta, muestra el formulario de login (ya que puede haber introducido mal la contraseña) --*/
        const alerta = divContainerLogin.querySelector(".alert");
        if (alerta != null) {
            divContainerLogin.classList.remove("d-none");
        }
    }

    /*-- Si existe formulario de registro en la página... --*/
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
        // divContainerRegistro.addEventListener("blur", (e) => {
        //     divContainerRegistro.classList.add("d-none");
        // });

        /*-- Si existe una alerta, muestra el formulario de registro (ya que puede haber introducido mal algún dato) --*/
        const alerta = divContainerRegistro.querySelector(".alert");
        if (alerta != null) {
            divContainerRegistro.classList.remove("d-none");
        }
    }
});