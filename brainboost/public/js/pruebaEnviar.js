function sendDataToRoute() {
    // Create the JSON payload
    const payload = {
        id_intento_test: 1,
        id_pregunta: 1,
        nota_pregunta: 1,
        respuestas: '{"respuestas_correctas": "Claude Debussy"}'
    };

    // Get the CSRF token from the page
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Send the JSON payload to the route
    fetch('/intentos_pregunta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken  // Include the CSRF token in the request headers
        },
        body: JSON.stringify(payload)
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
            console.log('User ID:', data.user_id);
            console.log('Request Data:', data.request_data);
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle any errors that occur during the request
        });
}
