function sendDataToRoute() {
    let id_test = 1;

    let testRealizado = {
        id_test: 1,
        id_usuario: 1,
        intento: 1,
        dificultad: 1,
        modalidad: 1,
    };



    let preguntasTestRealizado = {
        1: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        2: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        3: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        4: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        5: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        6: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        7: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        8: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        9: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        },
        10: {
            id_intento_test: id_test,
            id_pregunta: 1,
            nota_pregunta: 1,
            respuestas: {"respuestas_correctas": "Claude Debussy"}
        }
    }
    console.log(testRealizado);
    // Get the CSRF token from the page
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Send the JSON payload to the route
    fetch('/intentos_pregunta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
        },
        body: JSON.stringify(testRealizado)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Request failed');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response:', data);
            // Handle the response data as needed
            // console.log('User ID:', data.user_id);
            // console.log('Request Data:', data.request_data);
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle any errors that occur during the request
        });
}
