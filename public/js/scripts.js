document.addEventListener('DOMContentLoaded', function() {
    // When the DOM content is fully loaded, execute the following function

    let elements = document.querySelectorAll('.animate, .staggered');
    // Select all elements with classes 'animate' or 'staggered'

    let observer = new IntersectionObserver(entries => {
        // Create an IntersectionObserver to monitor when elements enter the viewport
        entries.forEach(entry => {
            // Iterate through each observed entry
            if (entry.isIntersecting) {
                // Check if the observed element is intersecting with the viewport
                entry.target.classList.add('active');
                // Add the 'active' class to the observed element to trigger CSS animations
            }
        });
    }, {
        threshold: 0.1  // Configure the intersection threshold (10% of element must be visible)
    });

    elements.forEach((element, index) => {
        // Iterate over each selected element
        if (element.classList.contains('staggered')) {
            // If the element has the 'staggered' class
            element.style.transitionDelay = `${index * 0.2}s`;
            // Apply a staggered transition delay based on index position
        }
        observer.observe(element);
        // Start observing each element with the IntersectionObserver
    });
});
