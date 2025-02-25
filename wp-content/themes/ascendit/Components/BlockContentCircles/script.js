
function checkDividers() {
    console.log('check dividers');
    const items = document.querySelectorAll(".link-grid__item");
    const viewportWidth = window.innerWidth;

    items.forEach((item, index) => {
        const divider = item.querySelector(".divider");
        if (!divider) return; // Skip if there's no divider

        const itemRect = item.getBoundingClientRect();
        let hasItemToRight = false;

        for (let i = index + 1; i < items.length; i++) {
            const nextItemRect = items[i].getBoundingClientRect();
            if (nextItemRect.left > itemRect.right && nextItemRect.left < viewportWidth) {
                hasItemToRight = true;
                break;
            }
        }

        if (!hasItemToRight) {
            divider.classList.add("hidden");
        } else {
            divider.classList.remove("hidden");
        }
    });
}

// Run on load and resize
window.addEventListener("load", checkDividers);
window.addEventListener("resize", checkDividers);
