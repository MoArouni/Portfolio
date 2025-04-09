document.addEventListener('DOMContentLoaded', function() {
    // Target ALL intro sections
    const introSections = document.querySelectorAll('.intro-section');

    // Process each section individually
    introSections.forEach(section => {
        // Split text into words (or lines) and wrap in <span>
        const text = section.textContent;
        section.innerHTML = text.split(' ').map(word => 
            `<span class="reveal-text">${word}</span>`
        ).join(' ');

        // Get all words in this section
        const words = section.querySelectorAll('.reveal-text');

        // Set up Intersection Observer for THIS section
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Animate words one by one
                    words.forEach((word, index) => {
                        setTimeout(() => {
                            word.classList.add('visible');
                        }, index * 50); // 100ms delay per word
                    });
                    observer.unobserve(entry.target); // Stop observing after triggering
                }
            });
        }, { threshold: 0.5 }); // Trigger when 50% visible

        // Start observing this section
        observer.observe(section);
    });
});