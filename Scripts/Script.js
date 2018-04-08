// To be used to hide the os buttons and reset the active property
function hide(id) {
  document.querySelectorAll(id).forEach((element) => {
    element.classList.add("hidden");
    element.classList.remove("active");
  });
};

// to be used to show the os buttons which just remove the 'hidden' class
function show(id) {
  document.querySelectorAll(id).forEach((element) => {
    element.classList.remove("hidden");
  });
};

// transition button logic
function clickButton(id, from, to) {
  document.querySelector(id).addEventListener("click", () => {
    document.querySelector(from).classList.toggle("hidden");
    document.querySelector(to).classList.toggle("hidden");
  });
};

// Displays the os versions for the ios OS
document.querySelector("#ios-btn").addEventListener("click", () => {
  hide(".android-os");
  show(".ios-os");
});

// Displays the os versions for the android OS
document.querySelector("#android-btn").addEventListener("click", () => {
  hide(".ios-os");
  show(".android-os");
});

// Hides all os choices when other is pressed
document.querySelector("#other-btn").addEventListener("click", () => {
 hide(".ios-os");
 hide(".android-os");
});

// landing page
clickButton("#search-btn", ".landing-page", ".display-page");
clickButton("#add-device-btn", ".landing-page", ".add-device-page");

// add device page
clickButton("#add-device-page-save-btn", ".add-device-page", ".landing-page");
clickButton("#add-device-page-back-btn", ".add-device-page", ".landing-page");

// display page
clickButton("#display-page-back-btn", ".display-page", ".landing-page");
clickButton("#info-btn", ".display-page", ".info-page");
clickButton("#assign-btn", ".display-page", ".assign-overlay");

// info page
clickButton("#info-page-edit-btn", ".info-page", ".edit-page");
clickButton("#info-page-back-btn", ".info-page", ".display-page");

// assign overlay
clickButton("#assign-overlay-save-btn", ".assign-overlay", ".display-page");
clickButton("#assign-overlay-back-btn", ".assign-overlay", ".display-page");

// edit page
clickButton("#edit-page-save-btn", ".edit-page", ".info-page");
clickButton("#edit-page-back-btn", ".edit-page", ".info-page");
