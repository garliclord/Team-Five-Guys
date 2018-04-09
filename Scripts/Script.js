function openNav() {
  document.getElementById("myNav").style.display = "block";
}

function closeNav() {
  document.getElementById("myNav").style.display = "none";
}

// document.querySelector("#myNav").addEventListener("click", () => {
//   document.querySelector("#myNav").classList.toggle("hidden");
// });

// document.querySelector("#overlay-btn").addEventListener("click", () => {
//   document.querySelector("#myNav").classList.toggle("hidden");
// });

// document.querySelector("#close-btn").addEventListener("click", () => {
//   document.querySelector("#myNav").classList.toggle("hidden");
// });

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
