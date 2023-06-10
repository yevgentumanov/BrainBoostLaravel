// Uso la sintaxis de Composition API: https://pinia.vuejs.org/core-concepts/

import {defineStore} from 'pinia';
import {Test} from './TestModel.js';
import {TestController} from './TestController.js';
import { ref } from 'vue';
export const useMyStore = defineStore("myStore", () => {
    const testObj = ref(new Test());
    const testCtrl = ref(new TestController(testObj.value));
    const url = ref(new URL(document.location.href));

    return {testObj, testCtrl, url}
});