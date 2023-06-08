function sendDataToRoute() {
    const url = '/preguntas_realizadas'; // Replace with your actual route URL

    // Prepare the request data
    const requestData = {
        id_test: 1, // Replace with the desired test ID
        intento: 1 // Replace with the desired intento value
    };
    // Retrieve the CSRF token from the page
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Add the CSRF token to the headers
        },
        body: JSON.stringify(requestData)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Print the response data to the console
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// function sendDataToRoute() {
//     let id_test = 1;
//     let id_test_creado = "id_test_creado";
//     // Get the CSRF token from the page
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//
//     let testRealizado = {
//         id_test: 1,
//         id_usuario: 1,
//         intento: 1,
//         dificultad: 1,
//         modalidad: 1,
//         preguntasTestRealizado: {
//             1: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 1,
//                 nota_pregunta: 1.1,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             2: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 2,
//                 nota_pregunta: 1.2,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//            3: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 3,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             4: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 4,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             5: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 5,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             6: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 6,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             7: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 7,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             8: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 8,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             9: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 9,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             },
//             10: {
//                 id_intento_test: id_test_creado,
//                 id_pregunta: 10,
//                 nota_pregunta: 1.0,
//                 respuestas: {"respuestas_correctas": "Claude Debussy"}
//             }
//         }
//     }
//     console.log(testRealizado);
//
//     // Send the JSON payload to the route
//     // fetch('intentos_pregunta', {
//     fetch("http://localhost/Proyectos/BrainBoostLaravel/brainboost/public/intentos_pregunta", {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
//         },
//         body: JSON.stringify(testRealizado)
//     })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Request failed with status ' + response.status);
//             }
//             return response.json();
//         })
//         .then(data => {
//             console.log('Response:', data);
//             // Handle the successful response
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             // Handle any errors that occur during the request
//             if (error instanceof Error) {
//                 // Handle network or other fetch-related errors
//                 console.log('Fetch error:', error.message);
//             } else {
//                 // Handle error response from the server
//                 error.text().then(errorMessage => {
//                     console.log('Error message:', errorMessage);
//                     // Handle the error message from Laravel or the server
//                 });
//             }
//         });
// }
