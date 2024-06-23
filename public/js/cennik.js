document.addEventListener('DOMContentLoaded', function() {
    const services = document.querySelectorAll('.service');

    services.forEach(service => {
        service.addEventListener('click', function() {
            const serviceName = this.querySelector('h2').textContent;
            const price = this.querySelector('.price').textContent;
            alert(`Kliknąłeś usługę: ${serviceName}\nCena: ${price}`);
        });
    });
});
