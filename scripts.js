document.addEventListener('DOMContentLoaded', function() {
    let elements = document.querySelectorAll('.animate, .staggered');
    let observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.1
    });

    elements.forEach((element, index) => {
        if (element.classList.contains('staggered')) {
            element.style.transitionDelay = `${index * 0.2}s`;
        }
        observer.observe(element);
    });
});
