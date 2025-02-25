document.querySelectorAll(".column-entry .toggle").forEach((toggle) => {
    toggle.addEventListener("click", function () {
      const content = this.closest(".column-entry").querySelector(".content");
      if (content) {
        content.classList.toggle("flipped");
      }
    });
  });