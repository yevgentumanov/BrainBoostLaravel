let test1 = new Test();
let testController1 = new TestController(test1);
testController1.downloadQuestionsByIdTest(1);
// test1.downloadQuestionsByIdTest(91);

console.log(test1);

/*-- Expresiones regulares --*/
// const regex = /\$\{(.*?)\}/g;
const regex = /\$\{((\d+):(.*?))\}/g; // ${1:hueco1}, esto es: pregunta 1, hueco 1
let webElements = [];
let pregunta = "I ${1:hueco1} to work by bus every day. She ${1:hueco2} from the University of California last year. We ${1:hueco3} a great time at the party last night. My brother ${1:hueco4} me his car for the weekend."
const enunciado = document.querySelector("#pregunta");
enunciado.innerHTML = pregunta.replace(regex, (match, contenido) => `<b>${contenido}</b>`);

/*-- Prueba a acceder a cada hueco y a crear un input text para cada uno --*/
let aparicion;
while ((aparicion = regex.exec(pregunta)) !== null) {
    const element = document.createElement("input");
    element.type = "text";
    element.name = aparicion[1];
    webElements.push(element)
}
console.log(aparicion);
console.log(aparicion = regex.exec(pregunta));
console.log(aparicion);
console.log(aparicion = regex.exec(""));
console.log(aparicion);

/*-- Crea un boton --*/
const boton = document.createElement("input");
boton.type = "submit";
boton.value = "Comprobar";
webElements.push(boton);

/*-- Añade todos los elementos al formulario --*/
const form = document.querySelector("form");
form.append(webElements[0], webElements[1], webElements[2], webElements[3], webElements[4]);

/*-- Programa las correcciones --*/
const respuestasCorrectas = {
    "${1:hueco1}": "go",
    "${1:hueco2}": "graduated",
    "${1:hueco3}": "had",
    "${1:hueco4}": "lent"
}
form.addEventListener("submit", (evento) => {
    evento.preventDefault();
    /*-- Comprueba si la respuesta introducida en cada hueco es correcta --*/
    if (form.elements.item(0).value == respuestasCorrectas[`\${${form.elements.item(0).name}}`] &&
    form.elements.item(1).value == respuestasCorrectas[`\${${form.elements.item(1).name}}`] &&
    form.elements.item(2).value == respuestasCorrectas[`\${${form.elements.item(2).name}}`] &&
    form.elements.item(3).value == respuestasCorrectas[`\${${form.elements.item(3).name}}`]) {
        window.alert("Has acertado todas las preguntas")
    } else {
        window.alert("No has acertado todas las preguntas")
    }
    
});






// obtenerJSON(Rutas.HOST_NAME + Rutas.RUTA_PREGUNTAS, "GET", null, null)
// .then(response => {
//     console.log(response);
// })

// fetch(Rutas.HOST_NAME + Rutas.RUTA_PREGUNTAS, {method: "GET", 'Content-Type': 'application/json',
// 'Accept': 'application/json', "Access-Control-Allow-Origin": "no-cors"})
// .then(response => {
//     if (response.ok) {
//         return response.json();
//     }
// })
// .then(responseText => {
//     console.log(responseText);
// })
// obtenerJSON("https://jsonplaceholder.typicode.com/users", "GET", null)