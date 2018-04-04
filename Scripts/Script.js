
document.querySelector("#iOS").addEventListener("click", () => {
  $(".android-os").prop('disabled', true);
}
)

// transition button logic
function clickButton(id, from, to) {
  document.querySelector(id).addEventListener("click", () => {
    document.querySelector(from).classList.toggle("hidden");
    document.querySelector(to).classList.toggle("hidden");
  });
};
// landing page
clickButton("#ios-btn", ".landing-page", ".display-page");
clickButton("#android-btn", ".landing-page", ".display-page");
clickButton("#other-btn", ".landing-page", ".display-page");
clickButton("#add-device-btn", ".landing-page", ".add-device-page");

// add device page
clickButton("#add-device-page-back-btn", ".add-device-page", ".landing-page");

// display page
clickButton("#display-page-back-btn", ".display-page", ".landing-page");
clickButton("#info-btn", ".display-page", ".info-page");
clickButton("#assign-btn", ".display-page", ".assign-overlay");

// info page
clickButton("#info-page-edit-btn", ".info-page", ".edit-page");
clickButton("#info-page-back-btn", ".info-page", ".display-page");

// assign overlay
clickButton("#assign-overlay-back-btn", ".assign-overlay", ".display-page");

// edit page
clickButton("#edit-page-back-btn", ".edit-page", ".info-page");
