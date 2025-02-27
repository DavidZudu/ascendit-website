document.addEventListener("DOMContentLoaded", function () {
    console.log("Smooth scroll script loaded");
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute("href").includes("#") ? this.getAttribute("href").split("#")[1] : "";
            console.log("targetId", targetId);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const offset = window.innerWidth < 768 ? 32 :40; // Set offset based on screen width
                const targetPosition = targetElement.offsetTop - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        });
    });
});
