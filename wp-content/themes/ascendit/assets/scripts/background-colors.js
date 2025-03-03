document.addEventListener("DOMContentLoaded", function () {
    console.log("Background colors script loaded");
    const bgElements = [...document.querySelectorAll(".bg-effect")];
    const colors = ["#055554", "#055554", "#094a66"];
    let colorIndex = 0;

    const observer = new IntersectionObserver((entries) => {
        let visibleElements = entries
            .filter(entry => entry.isIntersecting)
            .sort((a, b) => bgElements.indexOf(b.target) - bgElements.indexOf(a.target)); // Prioritize elements lower in the DOM

        if (visibleElements.length > 0) {
            const lastElementIndex = bgElements.indexOf(visibleElements[0].target);
            colorIndex = lastElementIndex % colors.length;
            bgElements.forEach(el => el.style.backgroundColor = colors[colorIndex]);
        }
    }, { threshold: 0.8 }); // Trigger when 50% visible

    bgElements.forEach(el => observer.observe(el));
});
