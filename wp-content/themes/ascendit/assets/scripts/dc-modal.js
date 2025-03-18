// Variable to store modal-trigger element for returning focus on close.
let returnEl;
let dcModals;

document.addEventListener("DOMContentLoaded", function (e) {
  dcModals = document.querySelectorAll(".dc-modal");
  console.log("dc-modal")

  // Move all modals to end of DOM
  dcModals.forEach((el) => {
    document.body.appendChild(el);
  });
});

document.addEventListener("click", function (e) {
  // Open modal
  if (e.target && e.target.closest("[data-modal-toggle]")) {
    e.preventDefault();
    const trigger = e.target.closest("[data-modal-toggle]");
    const target = document.querySelector(
      "[data-id=" + trigger.dataset.modalToggle + "]"
    );
    openModal(target);
    trapFocus(target, trigger);
  }

  // Close modal
  if (e.target && e.target.closest("[data-modal-close]")) {
    e.preventDefault();
    const button = e.target.closest("[data-modal-close]");
    closeModal(button.closest(".dc-modal"));
  }

  // Background-click close
  if (
    e.target &&
    e.target.matches(".dc-modal") &&
    e.target.dataset.bgClose != "false"
  ) {
    closeModal(e.target);
  }
});

const openModal = (modal) => {
  modal.classList.add("open");
};
const closeModal = (modal) => {
  modal.classList.remove("open");
  returnEl.focus();
};

// Trap focus inside modal when active.
const trapFocus = (el, trigger) => {
  returnEl = trigger;
  var focusableEls = el.querySelectorAll(
    'a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'
  );
  // checkffor search field
  let focusSearch = null;
  focusableEls.forEach(function(element) {
    // Check if the element has a specific ID
    if (element.matches('.search-form .s')) {
      focusSearch = element;
    }
}); 
  var firstFocusableEl = focusSearch ? focusSearch : focusableEls[0];
  var lastFocusableEl = focusableEls[focusableEls.length - 1];
  var KEYCODE_TAB = 9;
  var modalStyle = getComputedStyle(el);
  var transition = parseFloat(modalStyle.transitionDuration) * 200;

  // Timeout required for Chrome bug & transition
  setTimeout(function () {
    firstFocusableEl.focus();
    firstFocusableEl.select();
  }, transition);

  el.addEventListener("keydown", function (e) {
    var isTabPressed = e.key === "Tab" || e.keyCode === KEYCODE_TAB;
    if (!isTabPressed) {
      return;
    }
    if (e.shiftKey) {
      /* shift + tab */ if (document.activeElement === firstFocusableEl) {
        lastFocusableEl.focus();
        e.preventDefault();
      }
    } /* tab */ else {
      if (document.activeElement === lastFocusableEl) {
        firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
};


function addModalToggleAttribute() {
  document.querySelectorAll('.contact-modal').forEach(element => {
      element.setAttribute('data-modal-toggle', 'contact-modal');
  });
}

// Call the function to apply the attribute
addModalToggleAttribute();