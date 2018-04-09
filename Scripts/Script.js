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

// Deselects the os-all option when another button is pressed
document.querySelectorAll('.os-non-all').forEach((element) => {
  element.addEventListener("click", () => {
    document.getElementById('os-all-btn').classList.remove("active")
  });
});

// Deseletcs the other options when os-all-btn is pressed
document.getElementById('os-all-btn').addEventListener("click", () => {
  document.querySelectorAll('.os-non-all').forEach((element) => {
    element.classList.remove("active")
  });
});

// Deselects the dgrade-all option when another button is pressed
document.querySelectorAll('.dgrade-non-all').forEach((element) => {
  element.addEventListener("click", () => {
    document.getElementById('dgrade-all-btn').classList.remove("active")
  });
});

// Deseletcs the other options when dgrade-all-btn is pressed
document.getElementById('dgrade-all-btn').addEventListener("click", () => {
  document.querySelectorAll('.dgrade-non-all').forEach((element) => {
    element.classList.remove("active")
  });
});


// Displays the os versions for the ios OS
document.querySelector("#ios-btn").addEventListener("click", () => {
  hide(".android-os");
  show(".ios-os");
  document.getElementById("os-all-btn").classList.add("active");
});

// Displays the os versions for the android OS
document.querySelector("#android-btn").addEventListener("click", () => {
  hide(".ios-os");
  show(".android-os");
  document.getElementById("os-all-btn").classList.add("active");
});

// Hides all os choices when other is pressed
document.querySelector("#other-btn").addEventListener("click", () => {
 hide(".ios-os");
 hide(".android-os");
 document.getElementById("os-all-btn").classList.add("active");
});

// Hides all os choices when all is pressed
document.querySelector("#all-btn").addEventListener("click", () => {
 hide(".ios-os");
 hide(".android-os");
 document.getElementById("os-all-btn").classList.add("active");
});
