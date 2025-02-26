document.querySelectorAll(".column-entry .toggle").forEach((toggle) => {
    toggle.addEventListener("click", function () {
      const content = this.closest(".column-entry").querySelector(".content");
      if (content) {
        content.classList.toggle("flipped");
      }
    });
  });


  function fitTextToParent(elements, maxFontSize = 300) {
    console.log("fitTextToParent");
    elements.forEach(element => {
        const parent = element.closest('.column-entry__image');
        const parentWidth = parent.clientWidth;
        const parentHeight = parent.clientHeight;
        let fontSize = 10; // Start with a small font size

        element.style.fontSize = fontSize + 'px';
        element.style.whiteSpace = 'nowrap'; // Prevent wrapping

        while (fontSize < maxFontSize) {
            element.style.fontSize = fontSize + 'px';
            const elementWidth = element.scrollWidth;
            const elementHeight = element.scrollHeight;
            
            if (elementWidth > parentWidth || elementHeight > parentHeight) {
                fontSize--; // Step back to the last valid size
                element.style.fontSize = fontSize + 'px';
                break;
            }
            fontSize++;
        }
        
        // Reduce final font size by 20px
        fontSize = Math.max(fontSize - 0, 10);
        element.style.fontSize = fontSize + 'px';
    });
}

// Usage example:
window.onload = () => {
    const textElements = document.querySelectorAll('.emoji-cover');
    fitTextToParent(Array.from(textElements));
};

window.addEventListener("resize", () => {
  const textElements = document.querySelectorAll('.emoji-cover');
  fitTextToParent(Array.from(textElements));
});