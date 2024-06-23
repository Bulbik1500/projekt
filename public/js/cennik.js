document.addEventListener('DOMContentLoaded', function() {
    // When the DOM content is fully loaded, execute the following function

    const services = document.querySelectorAll('.service');
    // Select all elements with class 'service' (each represents a service)

    services.forEach(service => {
        // Iterate over each service element

        service.addEventListener('click', function() {
            // Add a click event listener to each service element

            const serviceName = this.querySelector('h2').textContent;
            // Get the text content of the <h2> element inside the clicked service

            const price = this.querySelector('.price').textContent;
            // Get the text content of the element with class 'price' inside the clicked service

            alert(`Kliknąłeś usługę: ${serviceName}\nCena: ${price}`);
            // Display an alert with the service name and price when clicked
        });
    });
});
