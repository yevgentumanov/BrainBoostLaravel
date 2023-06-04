/**
 * Fichero donde se implementarán métodos para crear la vista del test dinámicamente mediante Vue, con los datos que reciba de TestModel, gracias a TestController.
 * @author Santiago
 * @version 28.05.2023
 */
import { createApp } from 'vue'
import TestVue from './views/main.js.vue'

document.addEventListener('DOMContentLoaded', () => {
    // const components = import.meta.globEager('./views/*.vue') // Carga la carpeta con los componentes de Vue

    const app = createApp(TestVue);

    app.mount("#appVue");
});