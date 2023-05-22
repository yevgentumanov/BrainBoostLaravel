/*-- Fichero donde se implementarán métodos para crear la vista del test dinámicamente, con los datos que reciba de TestModel --*/
document.addEventListener('DOMContentLoaded', () => {
    const app = new Vue({
        el: '#appVue',
        data: {
            testObj: new Test(),
            testCtrl: null
        },
        methods: {

        },
        created() {
            console.log("created");
            this.testCtrl = new TestController(this.testObj); // Inicia el controlador

            const rutaDesglosada = document.location.href.split("/");
            const lastSlash = rutaDesglosada[rutaDesglosada.length - 1];
            const indiceSeparador = lastSlash.indexOf("?");
            const id = Number.parseInt(indiceSeparador != -1 ? lastSlash.substring(0, indiceSeparador) : lastSlash);
            this.testCtrl.downloadQuestionsByIdTest(id);
            console.log(this.testObj);
        }
    });


});